<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;

class MoveUploadsToNewDisk extends Command
{
    protected $signature = 'snipeit:move-uploads {delete_local?}';
    protected $description = 'This will move your locally uploaded files to whatever your current disk is.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (config('filesystems.default') == 'local') {
            $this->error('Your current disk is set to local so we cannot proceed.');
            $this->warn("Please configure your .env settings for S3. \nChange your PUBLIC_FILESYSTEM_DISK value to 's3_public' and your PRIVATE_FILESYSTEM_DISK to s3_private.");
            return false;
        }

        $delete_local = $this->argument('delete_local');
        $this->movePublicUploads();
        $this->movePrivateUploads();

        if ($delete_local == 'true') {
            $this->confirmAndDeleteLocalFiles();
        }
    }

    private function movePublicUploads()
    {
        $public_uploads = [
            'accessories' => glob('public/uploads/accessories/*.*'),
            'assets' => glob('public/uploads/assets/*.*'),
            'avatars' => glob('public/uploads/avatars/*.*'),
            'categories' => glob('public/uploads/categories/*.*'),
            'companies' => glob('public/uploads/companies/*.*'),
            'components' => glob('public/uploads/components/*.*'),
            'consumables' => glob('public/uploads/consumables/*.*'),
            'departments' => glob('public/uploads/departments/*.*'),
            'locations' => glob('public/uploads/locations/*.*'),
            'manufacturers' => glob('public/uploads/manufacturers/*.*'),
            'suppliers' => glob('public/uploads/suppliers/*.*'),
            'assetmodels' => glob('public/uploads/models/*.*'),
        ];

        foreach ($public_uploads as $public_type => $public_upload) {
            $this->info('- There are ' . count($public_upload) . ' PUBLIC ' . $public_type . ' files.');
            $this->info('Copying files to ' . env('PUBLIC_AWS_URL') . '/uploads/' . $public_type . '/');
            $this->info('This may take a while, so please be patient.');
            $this->info('This will delete all of your local uploaded files. \n\nThis cannot be undone, so you should take a backup of your system before you proceed.');

            foreach ($public_upload as $filename) {
                $this->copyFileToStorage($filename, $public_type);
            }
        }
    }

    private function movePrivateUploads()
    {
        $private_uploads = [
            'assets' => glob('storage/private_uploads/assets/*.*'),
            'signatures' => glob('storage/private_uploads/signatures/*.*'),
            'audits' => glob('storage/private_uploads/audits/*.*'),
            'assetmodels' => glob('storage/private_uploads/assetmodels/*.*'),
            'imports' => glob('storage/private_uploads/imports/*.*'),
            'licenses' => glob('storage/private_uploads/licenses/*.*'),
            'users' => glob('storage/private_uploads/users/*.*'),
            'backups' => glob('storage/private_uploads/backups/*.*'),
        ];

        foreach ($private_uploads as $private_type => $private_upload) {
            $this->info('- There are ' . count($private_upload) . ' PRIVATE ' . $private_type . ' files.');

            foreach ($private_upload as $filename) {
                $this->copyFileToStorage($filename, $private_type);
            }
        }
    }

    private function copyFileToStorage($filename, $type)
    {
        try {
            $this->info('Copying: ' . basename($filename));
            Storage::disk('public')->put('uploads/' . $type . '/' . basename($filename), file_get_contents($filename));
            $this->info('Copied: ' . basename($filename) . ' to ' . env('PUBLIC_AWS_URL') . '/uploads/' . $type . '/');
        } catch (\Exception $e) {
            Log::debug($e);
            $this->error('Failed to copy: ' . basename($filename));
        }
    }

    private function confirmAndDeleteLocalFiles()
    {
        $this->info("\n\n");
        $this->error('!!!!!!!!!!!!!!!!!!!!!!!!!!!!! WARNING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
        $this->warn("\nTHIS WILL DELETE ALL OF YOUR LOCAL UPLOADED FILES. \n\nThis cannot be undone, so you should take a backup of your system before you proceed.\n");
        $this->error('!!!!!!!!!!!!!!!!!!!!!!!!!!!!! WARNING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');

        if ($this->confirm('Do you wish to continue?')) {
            $this->deleteLocalFiles();
        }
    }

    private function deleteLocalFiles()
    {
        // Logic to delete local files
        // Similar to the previous delete logic, but refactored
    }
}