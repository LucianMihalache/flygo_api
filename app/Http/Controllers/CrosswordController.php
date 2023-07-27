<?php

namespace App\Http\Controllers;

use App\Models\Crossword;
use App\Http\Requests\StoreCrosswordRequest;
use App\Http\Requests\UpdateCrosswordRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CrosswordController extends Controller
{
    /**
     * Returns the paginated crosswords
     * If no date is provided, it defaults to the current day.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'date' => ['nullable', 'date_format:Y-m-d']
        ]);

        $date = $request->input('date') ?? Carbon::now()->toDateString();

        $crosswords = Crossword::where('date', $date)
            ->paginate($request->input('per_page'));

        return response()->json($crosswords);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCrosswordRequest $request
     * @return JsonResponse
     */
    public function store(StoreCrosswordRequest $request): JsonResponse
    {
        try {
            $crossword = Crossword::create([
                'answer' => $request->input('answer'),
                'clue' => $request->input('clue'),
                'date' => $request->input('date'),
                'direction' => $request->input('direction'),
                'length' => strlen($request->input('answer'))
            ]);
            return response()->json([
                'data' => $crossword
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Could not create the crossword'
            ], \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCrosswordRequest $request
     * @param Crossword $crossword
     * @return JsonResponse
     */
    public function update(UpdateCrosswordRequest $request, Crossword $crossword): JsonResponse
    {
        try {
            $crossword->update($request->validated());
            return response()->json([
                'data' => $crossword
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Could not update the crossword'
            ], \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Crossword $crossword
     * @return JsonResponse
     */
    public function destroy(Crossword $crossword): JsonResponse
    {
        try {
            $crossword->delete();
            return response()->json();
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Could not delete the crossword'
            ], \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
