<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();
        return view('tasks.index', ['tugas' => $tugas]);
    }

    public function home(): Response
    {
        return response(view('tasks.home'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        Tugas::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $tugas = Tugas::findOrFail($id);
        return response(view('tasks.show', ['tugas' => $tugas]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id): Response
    // {
    //     $tugas = Tugas::findOrFail($id);
    //     return response(view('tasks.edit', ['tugas' => $tugas]));
    // }

    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $validatedData = $request->validate([
    //         'judul_tugas' => 'required|string|max:255',
    //         'deskripsi' => 'required|string',
    //         'tanggal' => 'required|date',
    //         'status' => 'required|string',
    //         'user_id' => 'required|integer',
    //     ]);

    //     $tugas = Tugas::findOrFail($id);
    //     $tugas->update($validatedData);

    //     return redirect()->route('tasks.index')->with('success', 'Data Berhasil Diubah!');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     $tugas = Tugas::findOrFail($id);
    //     $tugas->delete();

    //     return redirect()->route('tasks.index')->with('success', 'Tugas Berhasil Dihapus!');
    // }


    /**
     * @OA\Get(
     *     path="/tugas/{id}",
     *     tags={"Tugas"},
     *     operationId="listTugasById",
     *     summary="Tugas - Get By ID",
     *     description="Mengambil Data Tugas Berdasarkan ID",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="1",
     *             description="Masukan ID",
     *             example="1"
     *         ),
     *         description="ID Tugas"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil mengambil Data Tugas",
     *                 "data": {
     *                     "id": 1,
     *                     "judul_tugas": "Nama Tugas",
     *                     "deskripsi": "Deskripsi Tugas",
     *                     "tanggal": "2024-07-02",
     *                     "status": "Selesai",
     *                     "user_id": 1
     *                 }
     *             }
     *         ),
     *     ),
     * )
     */
    public function listTugasById($id)
    {
        $success = true;
        $message = 'Berhasil mengambil Data Tugas';
        $data = Tugas::find($id);

        if (!$data) {
            $success = false;
            $message = 'Tugas tidak ditemukan';
            $data = null;
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $data ? 200 : 404);
    }

    /**
     * @OA\Put(
     *     operationId="updateTugas",
     *     tags={"Tugas"},
     *     summary="Tugas - Update",
     *     description="Update data Tugas",
     *     path="/tugas/update",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         description="Request Body Description",
     *         required=true,
     *         @OA\JsonContent(
     *             example={
     *                "id": 1,
     *                "judul_tugas": "Nama Tugas Baru",
     *                "deskripsi": "Deskripsi Tugas Baru",
     *                "tanggal": "2024-07-02",
     *                "status": "Belum Selesai",
     *                "user_id": 1
     *             }
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Data berhasil diubah"
     *             }
     *         ),
     *     ),
     * )
     */
    public function updateTugas(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:tugas,id',
            'judul_tugas' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
            'user_id' => 'required|exists:user,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update data
        $data = Tugas::find($request->id);
        $data->judul_tugas = $request->judul_tugas;
        $data->deskripsi = $request->deskripsi;
        $data->tanggal = $request->tanggal;
        $data->status = $request->status;
        $data->user_id = $request->user_id;
        $data->save();

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }


    /**
     * @OA\Delete(
     *     operationId="deleteTugas",
     *     tags={"Tugas"},
     *     summary="Tugas - Delete By ID",
     *     description="Delete data Tugas",
     *     path="/tugas/delete",
     *     security={{ "bearerAuth": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request Body Description",
     *         @OA\JsonContent(
     *             example={
     *                "id": 1
     *             },
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil menghapus Data Tugas",
     *             }),
     *     ),
     * )
     */
    public function deleteTugas(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:tugas,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Delete data
        Tugas::destroy($request->id);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
