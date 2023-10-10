<?php

namespace App\DataTables;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('title', function ($row) {
                return '<a href="'.route('post.show', $row->id).'">'.$row->title.'</a>';
            })
            ->addColumn('category', function ($row) {
                return $row->categoryName;
            })
            ->addColumn('content', function ($row) {
                return $row->limit();
            })
            ->addColumn('created_at', function ($row) {
                return date('M, d Y', strtotime($row->created_at));
            })
            ->addColumn('status', function ($row) {
                if($row->status == 0) {
                    return '<div class="badge badge-warning">DRAFT</div><br>';
                } else{
                    return '<div class="badge badge-success">PUBLISHED</div><br>';
                }
            })
            ->addColumn('action', function($row){
                return '
                <div class="buttons d-flex">
                    <a href="'.route("dashboard.post.edit", $row->id).'" class="btn btn-outline-info" rel="tooltip" data-original-title="Tooltip on top" title="Edit">Edit</a>
                    <form class="delete-form" action="'.route("dashboard.post.delete").'" method="POST">
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                        <input type="hidden" value="'.$row->id.'" name="post_id">
                        <button type="submit" class="btn btn-outline-danger" rel="tooltip" data-original-title="Tooltip on top" title="View">Delete</button>
                    </form>
                </div>
                ';
            })
            ->filter(function ($query) {

                $query->where('deleted_at', NULL)->orderBy('created_at', 'DESC');

            }, true)
            ->rawColumns(['action', 'title', 'status'])
            ->startsWithSearch()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('posts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                    ->data('DT_RowIndex'),
            Column::make('title'),
            Column::make('category'),
            Column::make('content'),
            Column::computed('status')
                    ->addClass('text-center'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Posts_' . date('YmdHis');
    }
}
