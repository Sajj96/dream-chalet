<?php

namespace App\DataTables;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PropertiesDataTable extends DataTable
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
            $prop = strtolower(preg_replace('/[ ,]+/', '-',$row->title.' '.$row->houseType->name.' '.$row->id));
            return '<a href="'.route('property.show', $prop).'">'.$row->title.'</a>';
        })
        ->addColumn('price', function ($row) {
            return number_format($row->price);
        })
        ->addColumn('type', function ($row) {
            return $row->houseType->name;
        })
        ->addColumn('created_at', function ($row) {
            return date('M, d Y', strtotime($row->created_at));
        })
        ->addColumn('action', function($row){
            return '
            <div class="buttons d-flex">
                <a href="'.route("dashboard.property.edit", $row->id).'" class="btn btn-outline-info" rel="tooltip" data-original-title="Tooltip on top" title="View Seats">Edit</a>
                <form class="delete-form" action="'.route("dashboard.property.delete").'" method="POST">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input type="hidden" value="'.$row->id.'" name="property_id">
                    <button type="submit" class="btn btn-outline-danger" rel="tooltip" data-original-title="Tooltip on top" title="View">Delete</button>
                </form>
            </div>
            ';
        })
        ->filter(function ($query) {

            $query->where('deleted_at', NULL)->orderBy('created_at', 'DESC');

        }, true)
        ->rawColumns(['action', 'title'])
        ->startsWithSearch()
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Property $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('properties-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('pdf'),
                        Button::make('print')
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
            Column::make('price'),
            Column::make('type'),
            Column::make('bedrooms'),
            Column::make('square_meter'),
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
        return 'Properties_' . date('YmdHis');
    }
}
