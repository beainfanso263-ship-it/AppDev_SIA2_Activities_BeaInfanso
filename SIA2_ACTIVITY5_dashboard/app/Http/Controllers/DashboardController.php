<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function admin(): View
    {
        return $this->showDashboard('Admin Dashboard');
    }

    public function user(): View
    {
        return $this->showDashboard('User Dashboard');
    }

    private function showDashboard(string $title): View
    {
        $weather = null;
        $forecast = [];
        $locationName = 'Silago, Southern Leyte, Philippines';

        try {
            $response = Http::timeout(10)->get('https://api.open-meteo.com/v1/forecast', [
                'latitude' => 10.5333,
                'longitude' => 125.1667,
                'current' => 'temperature_2m,weather_code,wind_speed_10m',
                'daily' => 'weather_code,temperature_2m_max,temperature_2m_min,precipitation_sum',
                'timezone' => 'auto',
                'forecast_days' => 5,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                $weather = [
                    'location' => $locationName,
                    'temperature' => $data['current']['temperature_2m'] ?? null,
                    'wind_speed' => $data['current']['wind_speed_10m'] ?? null,
                    'condition' => $this->weatherDescription($data['current']['weather_code'] ?? -1),
                ];

                $dates = $data['daily']['time'] ?? [];
                $codes = $data['daily']['weather_code'] ?? [];
                $maxTemps = $data['daily']['temperature_2m_max'] ?? [];
                $minTemps = $data['daily']['temperature_2m_min'] ?? [];
                $rain = $data['daily']['precipitation_sum'] ?? [];

                foreach ($dates as $index => $date) {
                    $forecast[] = [
                        'date' => $date,
                        'condition' => $this->weatherDescription($codes[$index] ?? -1),
                        'max_temp' => $maxTemps[$index] ?? null,
                        'min_temp' => $minTemps[$index] ?? null,
                        'rain' => $rain[$index] ?? null,
                    ];
                }
            }
        } catch (\Exception $e) {
            $weather = null;
            $forecast = [];
        }

        return view('dashboard', [
            'dashboardTitle' => $title,
            'weather' => $weather,
            'forecast' => $forecast,
        ]);
    }

    private function weatherDescription(int $code): string
    {
        return match ($code) {
            0 => 'Clear sky',
            1, 2, 3 => 'Partly cloudy',
            45, 48 => 'Fog',
            51, 53, 55 => 'Drizzle',
            61, 63, 65 => 'Rain',
            71, 73, 75 => 'Snow',
            80, 81, 82 => 'Rain showers',
            95 => 'Thunderstorm',
            default => 'Weather update unavailable',
        };
    }
}