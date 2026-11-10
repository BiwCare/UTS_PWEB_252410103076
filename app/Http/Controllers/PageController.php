<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login(): View
    {
        return view('login', [
            'activePage' => 'login',
        ]);
    }

    public function dashboard(Request $request): View
    {
        $username = $this->validatedUsername($request);
        $equipment = $this->equipment();
        $summary = $this->equipmentSummary($equipment);
        'location' => 'Jember, Jawa Timur',

        return view('dashboard', [
            'activePage' => 'dashboard',
            'username' => $username,
            'equipment' => array_slice($equipment, 0, 3),
            'categories' => $summary['categories'],
            'availableUnits' => $summary['availableUnits'],
            'equipmentTypes' => $summary['equipmentTypes'],
        ]);
    }

    public function pengelolaan(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:80'],
            'category' => ['nullable', 'string', 'max:40'],
            'available' => ['nullable', 'in:1'],
        ]);
        $equipment = $this->filterEquipment(
            $this->equipment(),
            trim($filters['q'] ?? ''),
            trim($filters['category'] ?? ''),
            $request->boolean('available'),
        );
        $summary = $this->equipmentSummary($equipment);

        return view('pengelolaan', [
            'activePage' => 'pengelolaan',
            'username' => $this->validatedUsername($request),
            'equipment' => $equipment,
            'equipmentTypes' => $summary['equipmentTypes'],
            'availableUnits' => $summary['availableUnits'],
            'categories' => count($summary['categories']),
        ]);
    }

    public function profile(Request $request): View
    {
        $username = $this->validatedUsername($request);

        return view('profile', [
            'activePage' => 'profile',
            'username' => $username,
            'initial' => mb_strtoupper(mb_substr($username, 0, 1)),
            'member' => [
                'type' => 'Pelanggan reguler',
                'joined' => 'November 2026',
                'rentals' => 4,
            ],
        ]);
    }

    private function validatedUsername(Request $request): string
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:40'],
        ]);

        return trim($validated['username']);
    }

    /** @param list<array{name: string, category: string, rate: int, status: string, units: int, image: string, detail: string}> $equipment
     * @return array{availableUnits: int, equipmentTypes: int, categories: list<string>}
     */
    private function equipmentSummary(array $equipment): array
    {
        return [
            'availableUnits' => array_sum(array_map(
                static fn (array $item): int => $item['status'] === 'Tersedia' ? $item['units'] : 0,
                $equipment,
            )),
            'equipmentTypes' => count($equipment),
            'categories' => array_values(array_unique(array_column($equipment, 'category'))),
        ];
    }

    /** @param list<array{name: string, category: string, rate: int, status: string, units: int, image: string, detail: string}> $equipment
     * @return list<array{name: string, category: string, rate: int, status: string, units: int, image: string, detail: string}>
     */
    private function filterEquipment(array $equipment, string $search, string $category, bool $availableOnly): array
    {
        return array_values(array_filter($equipment, static function (array $item) use ($search, $category, $availableOnly): bool {
            $matchesSearch = $search === '' || stripos(
                $item['name'].' '.$item['category'].' '.$item['detail'],
                $search,
            ) !== false;
            $matchesCategory = $category === '' || $item['category'] === $category;
            $matchesAvailability = ! $availableOnly || $item['status'] === 'Tersedia';

            return $matchesSearch && $matchesCategory && $matchesAvailability;
        }));
    }

    /** @return list<array{name: string, category: string, rate: int, status: string, units: int, image: string, detail: string}> */
    private function equipment(): array
    {
        return [
            [
                'name' => 'Traktor Roda 2',
                'category' => 'Olah lahan',
                'rate' => 450000,
                'status' => 'Tersedia',
                'units' => 3,
                'image' => 'https://i0.wp.com/quick.co.id/wp-content/2022/02/detail_k5dV7A3zGL.png?quality=50&fit=400,400',
                'detail' => 'Tenaga 40 HP · termasuk operator',
            ],
            [
                'name' => 'Cultivator Mini',
                'category' => 'Olah lahan',
                'rate' => 125000,
                'status' => 'Tersedia',
                'units' => 5,
                'image' => 'https://image.made-in-china.com/202f0j00QuYbHSPrqJzf/Best-Farm-Machine-Mini-Power-Tractor-Ditching-Rotary-Tiller-Cultivator-Prices.webp',
                'detail' => 'Mesin bensin · lebar kerja 80 cm',
            ],
            [
                'name' => 'Pompa Air 3 Inci',
                'category' => 'Irigasi',
                'rate' => 85000,
                'status' => 'Tersedia',
                'units' => 8,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTR_DPvr7Qc3GhRqYpb3Q2sWJVnz3Mypc3NPWJdBxh8IQ&s',
                'detail' => 'Debit 1.000 liter/menit · selang 20 m',
            ],
            [
                'name' => 'Mesin Panen Padi',
                'category' => 'Panen',
                'rate' => 850000,
                'status' => 'Jadwal penuh',
                'units' => 2,
                'image' => 'https://image.made-in-china.com/2f0j00NjWbZvKgwlki/Tagrm-Paddy-Grain-Wheat-Harvest-Machine-Small-Mini-Rice-Harvester.webp',
                'detail' => 'Combine harvester · kapasitas 0,5 ha/jam',
            ],
            [
                'name' => 'Mesin Tanam Padi',
                'category' => 'Tanam',
                'rate' => 375000,
                'status' => 'Tersedia',
                'units' => 2,
                'image' => 'https://andaromesin.com/wp-content/uploads/2025/10/Mesin-Tanam-Padi-4-Baris-MTP-4B-Rice-Transplanter-600x600.jpg',
                'detail' => 'Rice transplanter · 6 baris tanam',
            ],
            [
                'name' => 'Sprayer Gendong',
                'category' => 'Perawatan',
                'rate' => 55000,
                'status' => 'Tersedia',
                'units' => 12,
                'image' => 'https://vinsteknik.id/storage/products/image/1-1777465574.png',
                'detail' => 'Tangki 16 liter · mesin 2-tak',
            ],
        ];
    }
}
