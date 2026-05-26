<?php
// Detalhes da Viagem - Página Completa
$isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);

// Dados vindos do Controller (com IDs mascarados)
$maskedTravelId = $masked_travel_id ?? '';
$maskedDriverId = $masked_driver_id ?? '';
?>

<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARPOOL - Detalhes da Viagem</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --bg: #f0f2f5;
            --surface: #f0f2f5;
            --blue: #1e3a8a;
            --blue-light: #2d4eaa;
            --accent: #ffaa44;
            --text: #182a4d;
            --muted: #6b7280;
            --border: rgba(30,58,138,0.12);
            --shadow-out: -6px -6px 12px #ffffff, 6px 6px 12px #d1d9e6;
            --shadow-in: inset -3px -3px 7px #ffffff, inset 3px 3px 7px #d1d9e6;
            --shadow-card: -8px -8px 16px #ffffff, 8px 8px 16px #d1d9e6;
            --radius: 16px;
            --font-head: 'Oswald', sans-serif;
            --font-body: 'Outfit', sans-serif;
            --transition: .3s cubic-bezier(.4,0,.2,1);
        }

        .dark {
            --bg: #0b0f19;
            --surface: #111827;
            --blue: #3b82f6;
            --blue-light: #60a5fa;
            --accent: #ff8a3d;
            --text: #f1f5f9;
            --muted: #9ca3af;
            --border: rgba(59,130,246,0.15);
            --shadow-out: -6px -6px 12px #0a0d14, 6px 6px 12px #1a2035;
            --shadow-in: inset -3px -3px 7px #0a0d14, inset 3px 3px 7px #1a2035;
            --shadow-card: -8px -8px 16px #080b12, 8px 8px 16px #1e2640;
        }

        body {
            font-family: var(--font-body);
            background: var(--bg);
            color: var(--text);
            transition: background var(--transition), color var(--transition);
        }

        .neumorph {
            background: var(--surface);
            box-shadow: var(--shadow-card);
            border-radius: var(--radius);
        }

        .neu-input {
            background: var(--bg);
            box-shadow: var(--shadow-in);
            border-radius: 12px;
            padding: 12px 16px;
        }
    </style>
</head>
<body class="min-h-screen">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-[var(--blue)] text-white rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <span class="nav-brand">CAR<span class="text-[var(--accent)]">POOL</span></span>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-6 py-8 grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- LEFT COLUMN - TRIP DETAILS -->
        <div class="lg:col-span-8 space-y-8">

            <!-- Trip Header -->
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold" data-i18n="trip.details">Detalhes da Viagem</h1>
                    <p class="text-[var(--muted)] mt-1">Terça-feira, 26 de maio de 2026</p>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-[var(--accent)]">1.400 Kz</div>
                    <div class="text-sm text-[var(--muted)]">por passageiro</div>
                </div>
            </div>

            <!-- Itinerary -->
            <div class="neumorph p-6">
                <div class="flex gap-8 relative">
                    <div class="flex-1 space-y-8">
                        <div class="flex gap-4">
                            <div class="text-right w-20">
                                <div class="font-bold">07:30</div>
                                <div class="text-xs text-[var(--muted)]">0h30</div>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold">Talatona, Luanda</div>
                                <div class="text-sm text-[var(--muted)]">R. Pacífico José Diniz, 7 - A Definir</div>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="text-right w-20">
                                <div class="font-bold">08:00</div>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold">Maianga, Luanda</div>
                                <div class="text-sm text-[var(--muted)]">Av. Cristiano Machado, 8665 - Dona Clara</div>
                            </div>
                        </div>
                    </div>

                    <!-- Driver Card -->
                    <div class="w-80 neumorph p-5">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold">AL</div>
                            <div>
                                <div class="font-semibold">Alexbruno</div>
                                <div class="flex items-center gap-1 text-amber-500">
                                    ★★★★☆ <span class="text-sm text-gray-500 ml-1">4.88 (344)</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-check text-green-500"></i> Perfil Verificado</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-clock text-blue-500"></i> Raramente cancela caronas</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver Preferences -->
            <div class="neumorph p-6">
                <h3 class="font-semibold mb-4" data-i18n="driver.preferences">Preferências do Motorista</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center gap-3"><i class="fa-solid fa-ban text-red-500"></i> Cigarro não, por favor</div>
                    <div class="flex items-center gap-3"><i class="fa-solid fa-paw text-amber-500"></i> Prefiro não viajar com animais</div>
                    <div class="flex items-center gap-3"><i class="fa-solid fa-snowflake text-blue-500"></i> Ar condicionado</div>
                    <div class="flex items-center gap-3"><i class="fa-solid fa-car text-gray-500"></i> Ford KA - Marrom</div>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN - BOOKING -->
        <div class="lg:col-span-4">
            <div class="neumorph p-6 sticky top-6">

                <div class="text-center mb-6">
                    <div class="text-4xl font-bold text-[var(--accent)]">1.400 Kz</div>
                    <div class="text-sm text-[var(--muted)]">por passageiro • 1 lugar</div>
                </div>

                <?php if ($isLoggedIn): ?>
                <a href="<?= url("/pagamento-viagem/{$maskedTravelId}") ?>" 
                   class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl transition-all flex items-center justify-center gap-2 block text-center">
                    <i class="fa-solid fa-bolt"></i>
                    <span data-i18n="book.now">Reservar Agora</span>
                </a>
                <?php else: ?>
                <a href="<?= url("/login") ?>" 
                   class="w-full py-4 bg-gray-400 text-white font-bold rounded-2xl block text-center">
                    Faça Login para Reservar
                </a>
                <?php endif; ?>

                <div class="text-center text-xs text-[var(--muted)] mt-4">
                    Sua reserva será confirmada na hora
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
        }
    </script>
</body>
</html>