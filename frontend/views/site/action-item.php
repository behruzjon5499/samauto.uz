<?php
use common\helpers\LangHelper;

$title = 'title_' .$lang;
$text = 'text_' .$lang;

$this->title = $action->$title;

?>
<div class="stocks section-gap">
    <div class="small_container">
        <div class="stock-item">
            <div class="flex_row">
                <div class="mTitle"><?=$action->$title ?></div>
                <div class="countdown-container main-example" id="main-example"></div>
            </div>
            <img src="/uploads/actions/<?=$action->id .'/'. $action->image ?>">
            <div class="text">
                <?=$action->$text ?>
            </div>
        </div>
    </div>
</div>

<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/actions"><?=LangHelper::t("АКЦИИ", "MA'LUMOTLAR", "PROMOTIONS"); ?></a>
        <span><?=$action->$title ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>


<?php 
if($lang=='ru') {
    $labels = '["нед", "дня", "час", "мин", "сек"]';
}elseif ($lang=="en"){
    $labels = '["week", "day", "hour", "min", "sec"]';
}elseif ($lang=="uz"){
    $labels = '["хафт", "кун", "соат", "дак", "сек"]';
}

$date_end = date('m, d, Y',$action->date_end);

$script = "$(document).ready(function () {
    var labels = {$labels},
        nextYear = (new Date('{$date_end}')),
        template = _.template('<div class=\"time <%= label %>\"><span class=\"count curr top\"><%= curr %></span><span class=\"count next top\"><%= next %></span><span class=\"count next bottom\"><%= next %></span><span class=\"count curr bottom\"><%= curr %></span><span class=\"label\"><%= label.length < 6 ? label : label.substr(0, 3)  %></span></div>'),
        currDate = '00:00:00:00:00',
        nextDate = '00:00:00:00:00',
        parser = /([0-9]{2})/gi,
        example = $('#main-example');
    // Parse countdown string to an object
    function strfobj(str) {
        var parsed = str.match(parser),obj = {};
        labels.forEach(function(label, i) {
            obj[label] = parsed[i]
        });
        return obj;
    }
    // Return the time components that diffs
    function diff(obj1, obj2) {
        var diff = [];
        labels.forEach(function(key) {
            if (obj1[key] !== obj2[key]) {
                diff.push(key);
            }
        });
        return diff;
    }
    // Build the layout
    var initData = strfobj(currDate);
    labels.forEach(function(label, i) {
        example.append(template({
            curr: initData[label],
            next: initData[label],
            label: label
        }));
    });
    // Starts the countdown
    example.countdown(nextYear, function(event) {
        var newDate = event.strftime('%w:%d:%H:%M:%S'),data;
        if (newDate !== nextDate) {
            currDate = nextDate;
            nextDate = newDate;
            // Setup the data
            data = {
                'curr': strfobj(currDate),
                'next': strfobj(nextDate)
            };
            // Apply the new values to each node that changed
            diff(data.curr, data.next).forEach(function(label) {
                var selector = '.%s'.replace(/%s/, label),
                    node = example.find(selector);
                // Update the node
                node.removeClass('flip');
                node.find('.curr').text(data.curr[label]);
                node.find('.next').text(data.next[label]);
                // Wait for a repaint to then flip
                _.delay(function(node) {
                    node.addClass('flip');
                }, 50, node);
            });
        }
    });
});
";
$this->registerJs($script, yii\web\View::POS_END);
