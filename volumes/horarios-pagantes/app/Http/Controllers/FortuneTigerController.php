<?php

namespace App\Http\Controllers;

use App\Models\FortuneTiger;
use DateInterval;
use DateTime;
use DateTimeZone;
use Inertia\Inertia;

class FortuneTigerController extends Controller
{
	public function index() {
		$horarios = FortuneTiger::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
		->where('hora', (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H'))->first();
		if(!$horarios) {
			$porcentagem = \rand(92,99) . '.' . \rand(0,99);
			$horariosJson = \json_encode($this->generateHorarios($horarios));
			$horarios = FortuneTiger::create([
				'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
				'hora' => (int)(new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H'),
				'porcentagem' => $porcentagem,
				'horarios' => $horariosJson,
			]);
			FortuneTiger::create([
				'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
				'hora' => (int)(\date_add(new DateTime('now', new DateTimeZone('America/Sao_Paulo')), DateInterval::createFromDateString('1 hour')))->format('H'),
				'porcentagem' => $porcentagem,
				'horarios' => $horariosJson,
			]);
		}
		return Inertia::render('FortuneTiger', [
			'horarios' => \json_decode($horarios->horarios),
			'porcentagem' => $horarios->porcentagem,
		]);
	}

	public function generateHorarios($horarios): array {
		$horarios = $horarios ?? [];
		while(count($horarios) < 20) { 
			$interval = DateInterval::createFromDateString('1 hour');
			if (count($horarios) < 10) {
				$horario = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H') . ":" . \rand(0, 59);
			} else{
				$hora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
				$horario = (date_add($hora, $interval))->format('H') . ":" . \rand(0, 59);
			}
			$horario = date('H:i',strtotime($horario));
			if (!\in_array($horario, $horarios)) {
				$horarios[] = $horario;
			}
		}
		\sort($horarios);
		return $horarios;
	}
}
