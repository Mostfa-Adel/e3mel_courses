<?php

namespace App\DataTables;

use App\Models\Course;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourseDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('category_id', function (Course $model) {
                return   $model->category?$model->category->name:'';
            })
            ->editColumn('active', function (Course $model) {
                return   $model->activated;
            })
            ->editColumn('created_at', function (Course $model) {

                return   $model->created_at->toDateTimeString();
            })
            ->editColumn('updated_at', function (Course $model) {

                return   $model->updated_at->toDateTimeString();
            })
            ->editColumn('levels', function (Course $model) {

                return   $model->level;
            })
            ->addColumn('action', function (Course $model) {
                $mainRouteName='courses';
                return view('datatable._action-menu', compact('model','mainRouteName'));
            });    
        }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Course $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
    {
        return $model->newQuery()
        ->with('category', function ($q){
            $q->select('id', 'name');
        });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('course-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->searching(true)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
            // Column::make('id'),
            Column::make('name')->title(__('Name')),
            Column::make('views_count'),
            Column::make('levels'),
            Column::make('hours'),
            Column::make('active'),
            Column::make('category_id')->title(__('Category')),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Course_' . date('YmdHis');
    }
}
