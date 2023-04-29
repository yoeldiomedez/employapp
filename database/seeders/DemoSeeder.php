<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Career;
use App\Models\Company;
use App\Models\Applicant;
use App\Models\Document;
use App\Models\Education;
use App\Models\Training;
use App\Models\Experience;
use App\Models\Announcement;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->clean_directory('announcement');
        $this->clean_directory('document');
        $this->clean_directory('profile');
        $this->clean_directory('education');
        $this->clean_directory('experience');
        $this->clean_directory('training');

        $picf_file = $this->upload_file('profile', $this->uploaded_file('resources/assets/global/img/avatars/team9.jpg'));
        $picm_file = $this->upload_file('profile', $this->uploaded_file('resources/assets/global/img/avatars/team13.jpg'));
        $aff_file  = $this->upload_file('document', $this->uploaded_file('public/fut/DECLARACION_JURADA_PROCESO_CAS.pdf'));
        $vac_file  = $this->upload_file('document', $this->uploaded_file('public/fut/DECLARACION_JURADA_POSTULANTE_VACANTE.pdf'));
        $dni_file  = $this->upload_file('document', $this->uploaded_file('resources/assets/pages/media/docs/DNI.pdf'));
        $base_file = $this->upload_file('announcement', $this->uploaded_file('resources/assets/pages/media/docs/BASES.pdf'));

        $users = User::factory()->count(100)->create();

        foreach ($users as $user) {

            $user->roles()->sync([fake()->numberBetween(2, 3)]);

            switch ($user->roles[0]->id) {

                case 2: // POSTULANTE
                    $user->careers()->sync(Career::inRandomOrder()->limit(2)->get());
                    $user->profile_picture = ($user->gender == 'F') ? $picf_file : $picm_file ;
                    $user->save();
    
                    Document::factory()->for($user)->create([
                        'affidavit_file' => $aff_file, 
                        'vacancy_file'   => $vac_file,
                        'dni_file'       => $dni_file, 
                    ]);
                    Applicant::factory()->for($user)->create();

                    Experience::factory()->count(3)->for($user)->create();
                    Education::factory()->count(2)->for($user)->create();
                    Training::factory()->count(3)->for($user)->create();

                    break;

                case 3: // EMPRESA
                    $company       = Company::factory()->for($user)->create();
                    $announcements = Announcement::factory()->count(6)->for($company)->create([
                                        'bases' => $base_file
                                    ]);
                    foreach ($announcements as $announcement) {
                        $announcement->careers()->sync(Career::inRandomOrder()->limit(4)->get());
                        $announcement->save();                        
                    } 

                    break;
            }
        }
    }

    /**
     * Upload any file to a repository
     * 
     * @param   string $repo
     * @param   object $file (Illuminate\Http\UploadedFile)
     * @return  string $name
     */
    public function upload_file($repo, $file) : string
    {
        $path = Storage::disk(config('app.disk'))->put($repo, $file);
        $name = substr($path, strlen($repo) + 1);
        return $name;
    }

    /**
     * Create an UploadedFile object from absolute path
     * 
     * @param   string $path
     * @param   bool   $test default false
     * @return  object (Illuminate\Http\UploadedFile)
     */
    public function uploaded_file($path, $test = false)
    {
        $filesystem = new Filesystem;

        $name         = $filesystem->name($path);
        $extension    = $filesystem->extension($path);
        $originalName = $name . '.' . $extension;
        $mimeType     = $filesystem->mimeType($path);
        $error        = null;

        return new UploadedFile($path, $originalName, $mimeType, $error, $test);
    }

    /**
     * Create an UploadedFile object from absolute path
     * 
     * @param   string $path
     * @param   bool   $recursive default false
     * @return  void
     */
    function clean_directory($path, $recursive = false)
    {
        $storage = Storage::disk(config('app.disk'));

        foreach($storage->files($path, $recursive) as $file) {
            $storage->delete($file);
        }
    }
}
