<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class LastDocumentsTable extends PowerGridComponent
{
    use WithExport;

    public string $sortField = 'updated_at';
    public string $sortDirection = 'desc';

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): ?Builder
    {
        $subquery = DB::table('documents')
            ->leftJoin('companies', 'documents.company_id', '=', 'companies.id')
            ->leftJoin('projects', 'documents.project_id', '=', 'projects.id') // Añadir esta línea
            ->select('documents.*', 'companies.name as company_name', 'projects.title as project_name') // Añadir project_name
            ->orderBy('documents.updated_at', 'desc')
            ->limit(30)
            ->toSql();

        return Document::fromSub($subquery, 'alias_subquery');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('name', fn(Document $model) => $model->name . '.' . $model->extension)
            ->addColumn('project_name')
            ->addColumn('subphase_id', function (Document $model) {
                return $model->subphase ? $model->subphase->name : null;
            })
            ->addColumn('company_name', function (Document $model) {
                return $model->company_name ? $model->company_name : 'ADMIN';
            })
            ->addColumn('updated_at_formatted', fn(Document $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->headerAttribute('class', 'bg-gray-100')
                ->sortable()
                ->searchable(),

            Column::make('Subphase', 'subphase_id')
                ->sortable(),
            Column::make('Project', 'project_name')->sortable()->searchable(),
            Column::make('Company', 'company_name')
                ->sortable()
                ->searchable(),
            Column::make('Updated at', 'updated_at_formatted', 'updated_at')
                ->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('company_name')->operators(['contains']),
            Filter::inputText('project_name')->operators(['contains'])
        ];
    }


    #[\Livewire\Attributes\On('show')]
    public function show($rowId)
    {
        return redirect()->route('document.show', $rowId);
    }

    public function actions(Document $row): array
    {
        return [
            Button::add('show')
                ->slot('Show')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('show', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
