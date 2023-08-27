<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userID = $request->session()->get('sessionUserId');
        $list = Document::where('client_id', $userID )->get();
        return view('frontend.userprofile.listdocuments', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $validationRules = [
                'file' => 'required|mimes:pdf,docx,doc,xls,xlsx,jpg,jpeg,png|max:10240', // Maximum 10 MB
            ];

            $validationMessages = [
                'file.required' => 'Please select a file to upload.',
                'file.mimes' => 'Only PDF, DOCX,DOC, XLS, XLSX, JPG, JPEG, and PNG files are allowed.',
                'file.max' => 'The file size must not exceed 10 MB.',
            ];

            $validator = Validator::make($request->all(), $validationRules, $validationMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->storeAs('public/uploads', $fileName);

            $upload = new Document();
            $upload->file_name = $fileName;
            $upload->client_id = $request->client_id;
            $upload->category_name = $request->category_name;
            $upload->status = 0;
            $upload->original_name = $originalName;
            $upload->mime_type = $file->getClientMimeType();
            $upload->save();

            return redirect()->back()->with('message', 'File uploaded successfully.');
        } catch (PostTooLargeException $exception) {
            return redirect()->back()->withErrors(['file' => 'The uploaded file is too large.'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
    public function download($id)
    {
        $fileUpload = Document::findOrFail($id);
        $filePath = storage_path('app/public/uploads/' . $fileUpload->file_name);

        if (file_exists($filePath)) {
            return response()->download($filePath, $fileUpload->original_name);
        } else {
            // Handle the case where the file doesn't exist
            return back()->with('error', 'File not found.');
        }
    }

}
