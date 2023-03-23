<?php

namespace App\DataTables;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi',  function (Blog $blog) {
                $buttons = "";
                $buttons .= '<a href="' . route('web.blog.edit', ['blog' => $blog->id]) . '" class="btn btn-warning btn-sm text-white me-2">Edit</a>';
                $buttons .= '<button class="btn btn-danger btn-sm" id="hapus" data-url="' . route('web.blog.destroy', $blog->id) . '">Hapus</button>';
                return $buttons;
            })
            ->addColumn('judul',  function (Blog $blog) {
                return $blog->title;
            })
            ->addColumn('author',  function (Blog $blog) {
                return $blog->user->name;
            })
            ->addColumn('status', function (Blog $blog) {
                $status = '<input type="checkbox" id="status-' . $blog->id . '" data-id="' . $blog->id . '" data-switch="bool" /><label for="status-' . $blog->id . '" data-on-label="On" data-off-label="Off" ></label>';

                if ($blog->status == Blog::ACTIVE) {
                    $status = '<input type="checkbox" id="status-' . $blog->id . '" data-id="' . $blog->id . '" checked data-switch="bool" /><label for="status-' . $blog->id . '" data-on-label="On" data-off-label="Off" ></label>';
                }

                return $status;
            })
            ->addColumn('dibuat_pada', function (Blog $blog) {
                return Carbon::createFromFormat("Y-m-d H:i:s", $blog->created_at)->isoFormat("D MMMM Y");
            })
            ->setRowId('id')
            ->rawColumns(['status', 'aksi']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Blog $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('blogs-table')
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
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false),
            Column::computed('judul'),
            Column::computed('author'),
            Column::computed('status'),
            Column::computed('dibuat_pada'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Blogs_' . date('YmdHis');
    }
}
