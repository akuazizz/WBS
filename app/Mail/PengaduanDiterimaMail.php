<?php

namespace App\Mail;

use App\Models\Pengaduan; // Import model
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengaduanDiterimaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan; // Properti publik agar bisa diakses di view

    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengaduan Anda Telah Diterima - Kode Tracking: ' . $this->pengaduan->kode_pengaduan,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.pengaduan-diterima', // Nama view untuk template email
        );
    }
}
