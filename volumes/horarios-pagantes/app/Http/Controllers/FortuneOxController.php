<?php

namespace App\Http\Controllers;

use App\Models\FortuneOx;
use DateInterval;
use DateTime;
use DateTimeZone;
use Inertia\Inertia;

class FortuneOxController extends Controller
{
	public function index()
	{
		$horaAtual = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H');
		if ($horaAtual == 0 || $horaAtual % 2 == 0) {
			$modifyHour = '1 hour';
		} else {
			$modifyHour = '-1 hour';
		}
		$interval = DateInterval::createFromDateString($modifyHour);
		$hora = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

		$horarios = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
			->where('hora', $horaAtual)->first();
		$proximoHorario = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
			->where('hora', (date_add($hora, $interval))->format('H'))->first();
		
		if (!$horarios) {
			$i = 0;
			while ($i != 24) {
				$porcentagem = \rand(92, 99) . '.' . \rand(0, 99);
				$horariosJson = \json_encode($this->generateHorarios($horarios, $i));
				FortuneOx::create([
					'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
					'hora' => (int)$i,
					'porcentagem' => (float)$porcentagem,
					'horarios' => $horariosJson,
				]);
				$i++;
			}
			$horarios = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
				->where('hora', $horaAtual)->first();
			$proximoHorario = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
				->where('hora', (date_add($hora, $interval))->format('H'))->first();
		}
		$horariosReturn = \array_merge(\json_decode($horarios->horarios), \json_decode($proximoHorario->horarios));
		\sort($horariosReturn);
		return Inertia::render('FortuneOx', [
			'horarios' => $horariosReturn,
			'porcentagem' => $horarios->porcentagem,
		]);
	}

	public function generateHorarios($horarios, $horaAtual): array
	{
		$horarios = $horarios ?? [];
		while (count($horarios) < 10) {
			$horario = $horaAtual . ":" . \rand(0, 59);
			$horario = date('H:i', strtotime($horario));
			if (!\in_array($horario, $horarios)) {
				$horarios[] = $horario;
			}
		}
		\sort($horarios);
		return $horarios;
	}
}
