<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class CompaniesTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            // Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Company::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (Company $model) => strtolower(e($model->name)))
            ->addColumn('cif')
            ->addColumn('email')
            ->addColumn('country')
            ->addColumn('street_address')
            ->addColumn('city')
            ->addColumn('province')
            ->addColumn('postal_code')
            ->addColumn('created_at_formatted', fn (Company $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable(),
                // ->searchable(),

            Column::make('Email', 'email')
                ->sortable(),
                // ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('cif')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('country')->operators(['contains']),
            Filter::inputText('street_address')->operators(['contains']),
            Filter::inputText('city')->operators(['contains']),
            Filter::inputText('province')->operators(['contains']),
            Filter::inputText('postal_code')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('show')]
    public function show($rowId)
    {
        return redirect()->route('companies.show', ['id' => $rowId]);
    }
    

    public function actions(Company $row): array
    {
        return [
            Button::add('show')
                ->slot('Show')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('show', ['rowId' => $row->id]),
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
