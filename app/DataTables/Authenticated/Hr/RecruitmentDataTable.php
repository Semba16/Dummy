<?php

namespace App\DataTables\Authenticated\Hr;

use App\Models\HrRecruitment;
use App\Models\Recruitment;
use Laravel\Passport\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RecruitmentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image_url', function (HrRecruitment $data) {
                return view('pages.authenticated.hr.recruitment.table.columns._image_url', compact('data'));
            })
            ->editColumn('name', function (HrRecruitment $data) {
                return view('pages.authenticated.hr.recruitment.table.columns._name', compact('data'));
            })
            ->editColumn('expired_date', function (HrRecruitment $data) {
                return view('pages.authenticated.hr.recruitment.table.columns._expired_date', compact('data'));
            })
            ->addColumn('action', function (HrRecruitment $data) {
                $options = [
                    'href_edit' => route('hr.recruitment.edit', $data),
                    'href_destroy' => route('hr.recruitment.destroy', $data)
                ];
                return view('pages.vendor.datatables._action', compact('data'), $options);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(HrRecruitment $model): QueryBuilder
    {
        $r = $this->request;
        $query = $model->newQuery();
        // $query->where('user_id', $r->user()->id);
        // $query->where('personal_access_client', false);
        // $query->where('password_client', false);
        // $query->where('revoked', false);
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('recruitment-table')
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
            Column::make('image_url')->title('Poster'),
            Column::make('name')->title('Posisi'),
            Column::make('expired_date')->title('Masa Berlaku'),
            Column::make('users')->title('Pendaftar'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')->title('Aksi')
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
        return 'Recruitment_' . date('YmdHis');
    }
}
