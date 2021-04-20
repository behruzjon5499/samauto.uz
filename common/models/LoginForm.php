<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    /**
     * {@inheritdoc}
    */

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            print_r($this->getUser());
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {

        //echo '<pre>';print_r($this); exit;

        if ( $this->validate() ) {

            $user = $this->getUser();

            $this->userPerform( $user );

            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);

        }else{

            Yii::$app->session->setFlash('info','Неверные логин или пароль!');

            /*echo 'login';
            print_r($this->getErrors());
            exit;*/

        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->username);
            //print_r($this->_user); exit;

        }

        return $this->_user;
    }

    // здесь выполняются все операции при авторизации пользователя
    // 1. заполнение в БД списка из сессии избранных товаров

    private function userPerform(&$user){

        // если есть в избранном
        if ( $favorites = Yii::$app->session->get('favorites') ) {

            $user_id = $user->id;
            $favorites = json_decode($favorites, true);

            if ( count($favorites) ) { // если есть

                // ищем, то что уже внесено в бд, чтобы не дублировать
                if( $db_fav = Favorites::find()->where(['product_id'=>$favorites,'user_id'=>$user_id])->asArray()->all() ) {

                    foreach( $db_fav as $_fav ){

                        if( ! in_array( $_fav['id'], $favorites ) ){ // если нет еще в БД, то добавить
                            $fav = new Favorites();
                            $fav->product_id = $_fav['product_id'];
                            $fav->user_id = $user_id;
                            $fav->save();
                        }

                    }

                }else{

                    // проходим по тому, что есть в списке в сессии и добавляем в БД
                    foreach ( $favorites as $_fav ) {

                        $fav = new Favorites();
                        $fav->product_id = $_fav;
                        $fav->user_id = $user_id;
                        $fav->save();

                    }

                }

            }

        }

    }

}
