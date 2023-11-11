<?php

namespace App\Http\Controllers;

use App\Models\FortuneOx;
use App\Models\NinjaCrash;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Inertia\Response;

class GamesController extends Controller
{
    function index(): Response
    {
        $horaAtual = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H');

        $ninja = NinjaCrash::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
            ->where('hora', $horaAtual)->first();
        if (!$ninja) {
            $i = 0;
            while ($i != 24) {
                $porcentagem = \rand(92, 99) . '.' . \rand(0, 99);
                $horariosJson = \json_encode($this->generateHorarios($ninja, $i));
                NinjaCrash::create([
                    'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
                    'hora' => (int)$i,
                    'porcentagem' => (float)$porcentagem,
                    'horarios' => $horariosJson,
                ]);
                $i++;
            }
            $ninja = NinjaCrash::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
                ->where('hora', $horaAtual)->first();
        }
        $fortuneOx = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
            ->where('hora', $horaAtual)->first();
        if (!$fortuneOx) {
            $i = 0;
            while ($i != 24) {
                $porcentagem = \rand(92, 99) . '.' . \rand(0, 99);
                $horariosJson = \json_encode($this->generateHorarios($fortuneOx, $i));
                FortuneOx::create([
                    'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
                    'hora' => (int)$i,
                    'porcentagem' => (float)$porcentagem,
                    'horarios' => $horariosJson,
                ]);
                $i++;
            }
            $fortuneOx = FortuneOx::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
                ->where('hora', $horaAtual)->first();
        }
        $fortuneTiger = FortuneTiger::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
            ->where('hora', $horaAtual)->first();
        if (!$fortuneTiger) {
            $i = 0;
            while ($i != 24) {
                $porcentagem = \rand(92, 99) . '.' . \rand(0, 99);
                $horariosJson = \json_encode($this->generateHorarios($fortuneTiger, $i));
                FortuneTiger::create([
                    'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
                    'hora' => (int)$i,
                    'porcentagem' => (float)$porcentagem,
                    'horarios' => $horariosJson,
                ]);
                $i++;
            }
            $fortuneTiger = FortuneTiger::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
                ->where('hora', $horaAtual)->first();
        }
        $hallow = MrHallowWin::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
            ->where('hora', $horaAtual)->first();
        if (!$hallow) {
            $i = 0;
            while ($i != 24) {
                $porcentagem = \rand(92, 99) . '.' . \rand(0, 99);
                $horariosJson = \json_encode($this->generateHorarios($hallow, $i));
                MrHallowWin::create([
                    'data' => new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
                    'hora' => (int)$i,
                    'porcentagem' => (float)$porcentagem,
                    'horarios' => $horariosJson,
                ]);
                $i++;
            }
            $hallow = MrHallowWin::where('data', now(new DateTimeZone('America/Sao_Paulo'))->toDateString())
                ->where('hora', $horaAtual)->first();
        }
        // dd($ninja->horarios);

        return Inertia::render('Games', [
            'ninja' => json_decode($ninja?->horarios, true),
            'fortuneOx' => json_decode($fortuneOx?->horarios, true),
            'hallow' => json_decode($hallow?->horarios, true),
            'tiger' => json_decode($fortuneTiger?->horarios, true),
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
