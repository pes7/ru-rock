<?php
namespace app\widgets;

use yii\helpers\Html;

class BandGridView extends \yii\grid\GridView
{
    public function renderTableHeader()
    {
        $cells = [];
        foreach ($this->columns as $column) {
            /* @var $column Column */
            $cells[] = $column->renderHeaderCell();
        }
        
        $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
//        if ($this->filterPosition === self::FILTER_POS_HEADER) {
//            $content = $this->renderFilters() . $content;
//        } elseif ($this->filterPosition === self::FILTER_POS_BODY) {
//            $content .= $this->renderFilters();
//        }
        
        return "<thead>\n" . $content . "\n</thead>";
    }
    
    public function renderFilters()
    {
        if ($this->filterModel !== null) {
            $cells = [];
            foreach ($this->columns as $column) {
                /* @var $column Column */
                $cells[] = $column->renderFilterCell();
            }

            //<div id="w0-filters" class="filters">
            return Html::tag('div', implode('', $cells), $this->filterRowOptions);
        }

        return '';
    }
    
    public function renderItems()
    {
        $caption = $this->renderCaption();
        $columnGroup = $this->renderColumnGroup();
        $tableHeader = $this->showHeader ? $this->renderTableHeader() : false;
        $tableBody = $this->renderTableBody();

        $tableFooter = false;
        $tableFooterAfterBody = false;
        
        if ($this->showFooter) {
            if ($this->placeFooterAfterBody) {
                $tableFooterAfterBody = $this->renderTableFooter();
            } else {
                $tableFooter = $this->renderTableFooter();
            }
        }

        $content = array_filter([
            $caption,
            $columnGroup,
            $tableHeader,
            $tableFooter,
            $tableBody,
            $tableFooterAfterBody,
        ]);

        $dd =$this->renderFilters();
        $preSearch = "<div class='row'><div class='col s12'><h4>Поиск по группам:</h4></div><div class='col s12'>$dd</div></div>";
        $table = Html::tag('table', implode("\n", $content), $this->tableOptions);
        return $preSearch.$table;
    }
}
?>