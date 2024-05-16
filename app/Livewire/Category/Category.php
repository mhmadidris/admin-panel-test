<?php

namespace App\Livewire\Category;

use App\Models\Category as ModelsCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class Category extends Component
{
    public $categories;
    public $categoryName;

    public function boot()
    {
        $this->getData();
    }

    #[On('update-data')]
    public function getData()
    {
        $this->categories = ModelsCategory::all();
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
                message: "Nama kategori sudah ada",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );

            return;
        }

        $category = ModelsCategory::create([
            'category_name' => $this->categoryName,
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
                message: "Berhasil menambah kategori",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function editData($id)
    {
        $singleData = ModelsCategory::where('id', $id)->first();

        $this->categoryName = $singleData->category_name;
    }

    public function updateData($id)
    {
        $category = ModelsCategory::where('id', $id)->update([
            'category_name' => $this->categoryName,
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
                message: "Berhasil mengubah kategori",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function deleteData($id)
    {
        $category = ModelsCategory::where('id', $id)->delete();

        if ($category) {
            $this->dispatch(
                'showToast',
                isToast: true,
                position: "top-end",
                isShowConfirmButton: false,
                isShowCloseButton: true,
                icon: "success",
                message: "Berhasil menghapus kategori",
                timerDuration: 2500,
                isShowTimerProgressBar: true
            );
        }

        $this->dispatch('update-data');
    }

    public function clearInput()
    {
        $this->categoryName = '';
    }

    public function render()
    {
        return view('livewire.category.category');
    }

    private function checkData()
    {
        $data = ModelsCategory::where('category_name', $this->categoryName)->exists();

        return $data;
    }
}
