<?php

namespace App\Http\Controllers;

use App\Models\MrHallowWin;
use DateTime;
use DateTimeZone;
use Inertia\Inertia;

class MrHallowWinController extends Controller
{
	public function index() {
		$horarios = MrHallowWin::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
		->where('hora', (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H'))->first();
		if(!$horarios) {
			$horarios = MrHallowWin::create([
				'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
				'hora' => (int)(new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H'),
				'porcentagem' => \rand(92,99) . '.' . \rand(0,99),
				'horarios' => \json_encode($this->generateHorarios($horarios)),
			]);
		}
		return Inertia::render('MrHallowWin', [
			'horarios' => \json_decode($horarios->horarios),
			'porcentagem' => $horarios->porcentagem,
		]);
	}

	public function generateHorarios($horarios): array {
		$horarios = $horarios ?? [];
		while(count($horarios) < 20) { 
			$horario = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H') . ":" . \rand(0, 59);
			$horario = date('H:i',strtotime($horario));
			if (!\in_array($horario, $horarios)) {
				$horarios[] = $horario;
			}
		}
		\sort($horarios);
		return $horarios;
	}
}
