<?php

namespace App\Livewire\Unit;

use App\Models\Unit as ModelsUnit;
use Livewire\Attributes\On;
use Livewire\Component;

class Unit extends Component
{
    public $units;
    public $unitName, $unitCode;

    public function boot()
    {
        $this->getData();
    }

    #[On('update-data')]
    public function getData()
    {
        $this->units = ModelsUnit::orderBy('units.created_at', 'DESC')->get();
    }

    public function saveData()
    {
        $checkData = $this->checkData();

        if ($checkData) {
            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "info",
                message: "Kode satuan sudah ada",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );

            return;
        }

        $category = ModelsUnit::create([
            'unit_name' => $this->unitName,
            'unit_code' => $this->unitCode,
        ]);

        if ($category) {
            $this->clearInput();

            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil menambah satuan",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function editData($id)
    {
        $singleData = ModelsUnit::where('id', $id)->first();

        $this->unitName = $singleData->unit_name;
        $this->unitCode = $singleData->unit_code;
    }

    public function updateData($id)
    {
        $category = ModelsUnit::where('id', $id)->update([
            'unit_name' => $this->unitName,
            'unit_code' => $this->unitCode,
        ]);

        if ($category) {
            $this->clearInput();

            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil mengubah satuan",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function deleteData($id)
    {
        $category = ModelsUnit::where('id', $id)->delete();

        if ($category) {
            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil menghapus satuan",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function render()
    {
        return view('livewire.unit.unit');
    }

    private function checkData()
    {
        $data = ModelsUnit::where('unit_code', $this->unitCode)->exists();

        return $data;
    }

    private function clearInput()
    {
        $this->unitName = '';
        $this->unitCode = '';
    }
}
