<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizRecord;

class QuizRecordController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $records = QuizRecord::where('student_name', 'LIKE', "%$search%")
                    ->orWhere('subject', 'LIKE', "%$search%")
                    ->paginate(5);

        return view('quiz_records.index', compact('records'));
    }

    public function create()
    {
        return view('quiz_records.create');
    }

    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([
            'student_name' => 'required|max:255',
            'subject' => 'required|max:255',
            'quiz1' => 'required|numeric|min:0|max:100',
            'quiz2' => 'required|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $total = $request->quiz1 + $request->quiz2;

        $remarks = ($total >= 75) ? 'Passed' : 'Failed';

        $imageName = null;

        // IMAGE UPLOAD
        if($request->hasFile('image'))
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        }

        QuizRecord::create([
            'student_name' => $request->student_name,
            'subject' => $request->subject,
            'quiz1' => $request->quiz1,
            'quiz2' => $request->quiz2,
            'total' => $total,
            'remarks' => $remarks,
            'image' => $imageName
        ]);

        return redirect()->route('quiz_records.index');
    }

    public function show($id)
    {
        $record = QuizRecord::findOrFail($id);

        return view('quiz_records.show', compact('record'));
    }

    public function edit($id)
    {
        $record = QuizRecord::findOrFail($id);

        return view('quiz_records.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required|max:255',
            'subject' => 'required|max:255',
            'quiz1' => 'required|numeric|min:0|max:100',
            'quiz2' => 'required|numeric|min:0|max:100'
        ]);

        $record = QuizRecord::findOrFail($id);

        $total = $request->quiz1 + $request->quiz2;

        $remarks = ($total >= 75) ? 'Passed' : 'Failed';

        $record->update([
            'student_name' => $request->student_name,
            'subject' => $request->subject,
            'quiz1' => $request->quiz1,
            'quiz2' => $request->quiz2,
            'total' => $total,
            'remarks' => $remarks
        ]);

        return redirect()->route('quiz_records.index');
    }

    public function destroy($id)
    {
        QuizRecord::destroy($id);

        return redirect()->route('quiz_records.index');
    }
}