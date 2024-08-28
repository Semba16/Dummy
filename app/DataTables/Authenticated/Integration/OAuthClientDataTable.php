<?php

namespace App\DataTables\Authenticated\Integration;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Laravel\Passport\Client;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OAuthClientDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
        ->editColumn('name', function (Client $data) {
          return view('pages.authenticated.integration.oauth.table.columns._name', compact('data'));
        })
        ->addColumn('action', function (Client $data) {
          $options = [
            'href_edit' => route('integration.oauth2.edit', $data),
            'href_destroy' => route('integration.oauth2.destroy', $data)
          ];
          return view('pages.vendor.datatables._action', compact('data'), $options);
        })
        ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Client $model): QueryBuilder
  {
    $r = $this->request;
    $query = $model->newQuery();
    $query->where('user_id', $r->user()->id);
    $query->where('personal_access_client', false);
    $query->where('password_client', false);
    $query->where('revoked', false);
    return $query;
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
                ->setTableId('oauthapplication-table')
                ->columns($this->getColumns())
                ->minifiedAjax()
                //->dom('Bfrtip')
                ->orderBy(0)
                ->selectStyleSingle()
                ->buttons([
                  Button::make('excel'),
                  Button::make('csv'),
                  Button::make('pdf'),
                  Button::make('print'),
                  // Button::make('reset'),
                  // Button::make('reload')
                ]);
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    return [
      Column::make('name')->title('Nama Aplikasi'),
      //   Column::make('created_at'),
      //   Column::make('updated_at'),
      Column::computed('action')->title('')
            ->orderable(false)
            ->class('text-nowrap')
            ->exportable(false)
            ->printable(false)
            ->width(0)
            ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'OauthApplication_' . date('YmdHis');
  }
}
