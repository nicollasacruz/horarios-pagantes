<?php

namespace App\Http\Controllers;

use App\Models\FortuneOx;
use DateTime;
use DateTimeZone;
use Inertia\Inertia;

class FortuneOxController extends Controller
{
    public function index() {
		$horarios = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
		->where('hora', (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H'))->first();
		if(!$horarios) {
			$horarios = FortuneOx::create([
				'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
				'hora' => (int)(new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H'),
				'porcentagem' => \rand(92,99) . '.' . \rand(0,99),
				'horarios' => \json_encode($this->generateHorarios($horarios)),
			]);
		}
		return Inertia::render('FortuneOx', [
			'horarios' => \json_decode($horarios->horarios)
		]);
	}

	public function generateHorarios($horarios): array {
		$horarios = $horarios ?? [];
		while(count($horarios) < 20) { 
			if (!\in_array($horario = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H') . ":" . \rand(0, 59), $horarios)) {
				$horarios[] = date('H:i',strtotime($horario));
			}
		}
		\sort($horarios);
		return $horarios;
	}
}
