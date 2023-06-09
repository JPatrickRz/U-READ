<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Publication;
use App\Models\Author;
use App\Models\Adviser;
use App\Models\Panel;
use Illuminate\Http\Request;



class PublicationController extends Controller
{
     /**
     * Store a newly created publication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        if ($request->hasFile('pdf_file')) {
            $pdf_file = $request->file('pdf_file');
            if ($pdf_file->isValid()) {
                // Retrieve the original name of the uploaded file
                $pdf_file_name = $pdf_file->getClientOriginalName();
        
                // Store the pdf file in the storage disk which is located at the path storage/pdf_files
                $pdf_file_path = $pdf_file->store('public/pdf_files');
        
                // Get the binary data of the stored file
                $pdf_file_data = Storage::get($pdf_file_path);
            } else {
                // Handle invalid file upload
                return redirect()->back()->withErrors(['pdf_file' => 'Invalid file upload.']);
            }
        } else {
            $pdf_file_name = null;
            $pdf_file_data = null;
        }
        
        
    
       // Create the publication
        $publication = new Publication([
            'source_title' => $request->input('source_title'),
            'abstract' => $request->input('abstract'),
            'publisher' => $request->input('publisher'),
            'year' => $request->input('year'),
            'patent_status' => $request->input('patent_status'),
            'department' => $request->input('department'),
            'pdf_file_name' => $pdf_file_name,
            'pdf_file_data' => $pdf_file_path,
            
        ]);

        $publication->save();
        // Get the publication ID
        $publicationId = $publication->id;

        // Loop through the input data for each author
        foreach ($request->input('author_first_name') as $index => $firstName) {
            // Create the related author
            $author = Author::create([
                'publication_id' => $publicationId,
                'author_position' => $request->input('author_position'),
                'author_first_name' => $firstName,
                'author_mi_middle' => $request->input('author_mi_middle')[$index],
                'author_last_name' => $request->input('author_last_name')[$index],
                'author_suffix' => $request->input('author_suffix')[$index],
            ]);

             // Associate the author with the publication
            $publication->authors()->save($author);
        }

       
    
        // Get the publication ID
        $publicationId = $publication->id;

        // Loop through the input data for each adviser
        foreach ($request->input('adviser_first_name') as $index => $firstName) {
            // Create the related adviser
            $adviser = Adviser::create([
                'publication_id' => $publicationId,
                'adviser_position' => $request->input('adviser_position'),
                'adviser_first_name' => $firstName,
                'adviser_mi_middle' => $request->input('adviser_mi_middle')[$index],
                'adviser_last_name' => $request->input('adviser_last_name')[$index],
                'adviser_suffix' => $request->input('adviser_suffix')[$index],
            ]);

             // Associate the adviser with the publication
             $publication->advisers()->save($adviser);
        }
    

        // Get the publication ID
        $publicationId = $publication->id;

        // Loop through the input data for each adviser
        foreach ($request->input('panel_first_name') as $index => $firstName) {
            // Create the related panel
            $panel = Panel::create([
                'publication_id' => $publication->id,
                'panel_position' => $request->input('panel_position'),
                'panel_first_name' => $firstName,
                'panel_mi_middle' => $request->input('panel_mi_middle')[$index],
                'panel_last_name' => $request->input('panel_last_name')[$index],
                'panel_suffix' => $request->input('panel_suffix')[$index],
            ]);

            // Associate the panel with the publication
             $publication->panels()->save($panel);
        }
    
        return back()->with('info', 'Publication created successfully.');
    }    

    public function show($id)
    {
        // Retrieve the publication data from your model based on the $id parameter
        $publications = Publication::where('id', $id)->orderBy('source_title', 'asc')->paginate(8);

        return view('publications.show', compact('publications'));
    
    }
    
    public function search(Request $request)
    {
        $query = $request->input('search');
        $publications = Publication::where('source_title', 'LIKE', '%' . $query . '%')
            ->orderBy('source_title', 'asc') // Order by source_title in ascending order
            ->paginate(8);
    
        if ($request->ajax()) {
            return view('search-results', ['publications' => $publications, 'search' => $query]);
        }
    
        return view('home', ['publications' => $publications, 'search' => $query]);
    }
    
    public function showPdf($id)
    {
        $publication = Publication::findOrFail($id);
    
        $pdf_file_path = public_path('pdf/' . $publication->pdf_file_name);
    
        if (file_exists($pdf_file_path)) {
            $pdf_file_data = file_get_contents($pdf_file_path);
    
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $publication->pdf_file_name . '"',
            ];
    
            return response($pdf_file_data, 200, $headers);
        } else {
            return response('PDF file not found.', 404);
        }
    }
    

    public function downloadPDF($id)
    {
        $publication = Publication::findOrFail($id);
    
        $pdf_file_data = $publication->pdf_file_data;
        $pdf_file_name = $publication->pdf_file_name;
    
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $pdf_file_name . '"',
        ];
    
        return response($pdf_file_data, 200, $headers);
    }
    
    
    

    

     
}
