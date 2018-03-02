<?php

namespace bizley\podium\widgets;

use bizley\podium\models\User;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Podium ActiveUsers widget
 * Renders list of latest posts.
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class ActiveUsers extends Widget
{

    /**
     * Renders the list of active users.
     * @return string
     */
    public function run()
    {
        $out = Html::beginTag('div', ['class' => 'panel panel-default']) . "\n";
        $out .= Html::tag('div', Yii::t('podium/view', 'Most active users'), ['class' => 'panel-heading']) . "\n";

        $active = User::getActiveUsers();

        if ($active) {
            $out .= Html::beginTag('table', ['class' => 'table table-hover']) . "\n";
            foreach ($active as $user) {
                $out .= Html::beginTag('tr');
                $out .= Html::beginTag('td');
                $out .= Html::a($user['username'], ['members/view', 'id' => $user['id']], ['class' => 'center-block']) . "\n";
                $out .= Html::endTag('td');
                $out .= Html::endTag('tr');
            }
            $out .= Html::endTag('table') . "\n";
        } else {
            $out .= Html::beginTag('div', ['class' => 'panel-body']) . "\n";
            $out .= Html::tag('small', Yii::t('podium/view', 'No active users.')) . "\n";
            $out .= Html::endTag('div') . "\n";
        }

        $out .= Html::endTag('div') . "\n";

        return $out;
    }
}
