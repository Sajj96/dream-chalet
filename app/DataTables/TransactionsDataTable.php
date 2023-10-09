<?php

namespace App\DataTables;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransactionsDataTable extends DataTable
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
        ->addColumn('property', function ($row) {
            $prop = strtolower(preg_replace('/[ ,]+/', '-',$row->property->title.' '.$row->property->houseTypeName.' '.$row->property->id));
            return '<a href="'.route('property.show', $prop).'">'.$row->property->title.'</a>';
        })
        ->addColumn('user', function ($row) {
            return $row->userName;
        })
        ->addColumn('type', function ($row) {
            return strtoupper($row->type);
        })
        ->addColumn('amount', function ($row) {
            return '$'.number_format($row->amount);
        })
        ->addColumn('created_at', function ($row) {
            return date('M, d Y', strtotime($row->created_at));
        })
        ->addColumn('action', function($row){
            return '
            <div class="buttons d-flex">
                <a href="'.route("dashboard.transaction.show", $row->id).'" class="btn btn-outline-secondary" rel="tooltip" data-original-title="Tooltip on top" title="View">View</a>
                <form class="delete-form" action="'.route("dashboard.transaction.delete").'" method="POST">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input type="hidden" value="'.$row->id.'" name="inquiry_id">
                    <button type="submit" class="btn btn-outline-danger" rel="tooltip" data-original-title="Tooltip on top" title="View">Delete</button>
                </form>
            </div>
            ';
        })
        ->filter(function ($query) {

            $query->where('deleted_at', NULL)->orderBy('created_at', 'DESC');

        }, true)
        ->rawColumns(['action', 'property'])
        ->startsWithSearch()
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Transaction $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('transactions-table')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Transactions_' . date('YmdHis');
    }
}
