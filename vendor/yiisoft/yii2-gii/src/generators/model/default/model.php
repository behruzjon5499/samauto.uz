<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";

$image_exist = false; // наличие фото

// список языков для перевода
$langs = explode(',', trim($generator->lang,','));

?>

namespace <?= $generator->ns ?>;

use Yii;
use common\helpers\TextHelper;
<?php if($generator->gallery && $generator->galleryTable!=''){ // таблица для галереи ?>
use common\models\<?=$generator->galleryTable ?>;
<?php } ?>
use common\models\Images;

use yii\imagine\Image;
use yii\web\UploadedFile;


/**
 * This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
 *
<?php foreach ($tableSchema->columns as $column): ?>
 * @property <?= "{$column->phpType} \${$column->name}\n" ?>
    <?php if($column->name == 'image'){
        $image_exist = true;
    } ?>

<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?= $className ?> extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }
<?php if ($generator->db !== 'db'): ?>

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('<?= $generator->db ?>');
    }
<?php endif; ?>

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [<?= "\n            " . implode(",\n            ", $rules) . "\n        " ?>];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => " . $generator->generateString($label) . ",\n" ?>
<?php endforeach; ?>
        ];
    }
<?php foreach ($relations as $name => $relation): ?>

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
<?php endforeach; ?>
<?php if ($queryClassName): ?>
<?php
    $queryClassFullName = ($generator->ns === $generator->queryNs) ? $queryClassName : '\\' . $generator->queryNs . '\\' . $queryClassName;
    echo "\n";
?>
    /**
     * @inheritdoc
     * @return <?= $queryClassFullName ?> the active query used by this AR class.
     */
    public static function find()
    {
        return new <?= $queryClassFullName ?>(get_called_class());
    }
<?php endif; ?>


    public function updateModel($new=false){

        $post = Yii::$app->request->post();

        if($this->load($post) ) {

            if( $new ){ // если создается только один раз при создании
                //$this->date = time();
            }

            <?php

            if(count($langs)>1) {
                $n = 0;
                foreach ($langs as $lang) { // языки ?>
            if(isset($this->link_<?=$lang ?>)){
                if( $this->link_<?=$lang ?> == '' || isset($post['<?= $className ?>']['title_<?=$lang ?>']) ){
                    $this->link_<?=$lang ?> = TextHelper::Transliterate( $post['<?= $className ?>']['title_<?=$lang ?>'] );
                }
            }

                <?php }

            }else{  ?>
            if(isset($this->link)){
                if( $this->link == '' || isset($post['<?= $className ?>']['title']) ) {
                    $this->link = TextHelper::Transliterate( $post['<?= $className ?>']['title'] );
                }
            }

            <?php } ?>

            if( !$this->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении!');
                print_r($this->getErrors());
                exit;

                return true;
            }


            <?php if($image_exist){ ?>

            // сохранение изображения

            if( $file = UploadedFile::getInstance($this, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $fname = time() . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/<?=mb_strtolower($className) ?>");
                if(!is_dir($path)) @mkdir($path);

                $path = Yii::getAlias("@frontend/web/uploads/<?=mb_strtolower($className) ?>/" . $this->id . '/' );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                $filepath = $path . $fname ;

                // основная картинка - оригинал
                $file->saveAs($filepath);

                // эскиз
                Image::thumbnail($filepath, 100, 100)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // основное фото
                Image::thumbnail($filepath, 300, 300)
                    ->save($path . $fname , ['quality' => 100]);

                $this->image = $fname;
                if(!$this->save()){
                    print_r($this->getErrors()); exit;
                    return false;
                    exit;
                }

            }

            <?php if($generator->gallery){ ?>

            // изображения галереи
            if( $files = UploadedFile::getInstances($this, 'tmp_gallery_images' ) ) {

                $deleted_files = explode(';', $post['delete_gallery_image']);

                $i = 0;
                foreach ($files as $file) {
                    $i++;
                    if( ! preg_match('/image/',$file->type) ) return false;

                    // данный файл удален пользователем
                    if (in_array($i, $deleted_files)) continue;

                    $fid = time() + $i;
                    $fname = $fid . '.' . $file->extension;

                    $path = Yii::getAlias("@frontend/web/uploads/<?=mb_strtolower($className) ?>");
                    if(!is_dir($path)) @mkdir($path);

                    $path_main = Yii::getAlias("@frontend/web/uploads/<?=mb_strtolower($className) ?>/{$this->id}");
                    $path = Yii::getAlias("@frontend/web/uploads/<?=mb_strtolower($className) ?>/{$this->id}/gallery/");

                    if (!is_dir($path_main)) @mkdir($path_main);
                    if (!is_dir($path)) @mkdir($path);
                    if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                    $filepath = $path . $fname ;

                    // основная картинка - оригинал
                    $file->saveAs($filepath);

                    $gallery = new Images(); <?php //=$generator->galleryTable ?>
                    $gallery->image = $fname;
                    $gallery->product_id = $this->id;
                    $gallery->save();


                    // эскиз
                    Image::thumbnail($filepath, 100, 100)
                        ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                    // эскиз
                    Image::thumbnail($filepath, 300, 300)
                        ->save($path . $fname , ['quality' => 100]);

                }
            }

            <?php } // если установлен флаг gallery при создании CRUD

            } // $image_exist ?>

            Yii::$app->session->setFlash('info-success',' успешно сохранена!');

            return true;
        }
        return false;

    }

}
