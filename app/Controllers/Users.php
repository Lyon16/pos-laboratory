<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        return view('users', [
            'users' => $model->findAll()
        ]);
    }

    public function new()
    {
        return view('users_form', [
            'user' => null
        ]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $model->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')
            ->with('success', 'User added successfully!');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('users_form', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'username' => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]'
        ];

        $file = $this->request->getFile('avatar');

        if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] =
                'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        if ($file && $file->isValid()) {
            $directory = FCPATH . 'uploads/avatars/';

            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $extension = $file->getMimeType() === 'image/png'
                ? 'png'
                : 'jpg';

            $filename = bin2hex(random_bytes(16)) . '.' . $extension;

            try {
                service('image')
                    ->withFile($file->getTempName())
                    ->fit(200, 200, 'center')
                    ->save($directory . $filename);

                $data['avatar'] = $filename;
            } catch (\Throwable $e) {
                log_message('error', 'Avatar processing failed: ' . $e->getMessage());

                return redirect()->back()
                    ->withInput()
                    ->with('errors', [
                        'avatar' => 'Unable to prepare the profile picture.'
                    ]);
            }
        }

        $model->update($id, $data);

        return redirect()->to('/users')
            ->with('success', 'User updated successfully!');
    }
}
