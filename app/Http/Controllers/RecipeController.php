<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:30',
            'image' => 'required',
        ]);

        $data = [
            'publisher' => $request->input('publisher'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => '',
        ];
        
        $file = $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('Image'), $filename);
        $data['image']= $filename;

        $recipe = new Recipe();
        $recipe->name = $data['name'];
        $recipe->price = $data['price'];
        $recipe->description = $data['description'];
        $recipe->image = $data['image'];
        $recipe->publisher = $data['publisher'];
        $recipe->save();
        if($recipe->save()){
            return redirect('dashboard');
        }else{
            return redirect()->back();
        }

    }
    
    public function update(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:30',
            'image' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'id' => $request->input('id'),
            'image' => '',
        ];
        
        $file = $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('Image'), $filename);
        $data['image']= $filename;

        $update = Recipe::where('id', $data['id'])->update([
                                                'name' => $data['name'], 
                                                'image' => $data['image'], 
                                                'description' => $data['description'], 
                                                'price' => $data['price'], 
                                                ]);
        if($update){
            return redirect('dashboard');
        }
    }

    public function delete($id){
        $delete = Recipe::where('id',$id)->delete();
        if($delete){
            return redirect('dashboard');
        }
    }

}
