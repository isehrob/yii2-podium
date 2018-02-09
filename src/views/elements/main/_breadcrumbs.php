<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$_breadcrumbs = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];
$breadcrumbs = [];
foreach ($_breadcrumbs as $value){
    if(isset($value['url']) && $value['url'][0] == 'forum/category'){
        continue;
    }
    array_push($breadcrumbs, $value);
}
?>
<div class="row">
    <div class="hidden-xs col-sm-<?= isset($this->params['no-search']) && $this->params['no-search'] === true ? '12' : '9' ?>">
        <?= Breadcrumbs::widget(['links' => $breadcrumbs]); ?>
    </div>
<?php if (!isset($this->params['no-search']) || $this->params['no-search'] !== true): ?>
    <div class="col-sm-3">
        <?= Html::beginForm(['forum/search'], 'get'); ?>
            <div class="form-group">
                <div class="input-group">
                    <?= Html::textInput('query', null, ['class' => 'form-control']); ?>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-search"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="<?= Url::to(['forum/search']) ?>"><?= Yii::t('podium/view', 'Advanced Search Form') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?= Html::endForm(); ?>
    </div>
<?php endif; ?>
</div>
