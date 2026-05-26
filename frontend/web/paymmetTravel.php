<?php
// Dados simulados da viagem (em produção virão do controller)
$ride = [
    'id' => 1,
    'driver_name' => 'Alexbruno',
    'origin' => 'Talatona',
    'destination' => 'Maianga',
    'departure_time' => '07:30',
    'arrival_time' => '08:00',
    'price' => 1400,
    'seats' => 1
];

$isLoggedIn = true; // Simulação
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARPOOL - Pagamento da Viagem</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --bg: #f0f2f5;
            --surface: #f0f2f5;
            --blue: #1e3a8a;
            --accent: #ffaa44;
            --text: #182a4d;
            --muted: #6b7280;
        }
        .dark {
            --bg: #0b0f19;
            --surface: #111827;
            --blue: #3b82f6;
            --accent: #ff8a3d;
            --text: #f1f5f9;
            --muted: #9ca3af;
        }

        body {
            font-family: 'Outfit', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        .neumorph {
            background: var(--surface);
            box-shadow: -8px -8px 16px #ffffff, 8px 8px 16px #d1d9e6;
            border-radius: 20px;
        }
        .dark .neumorph {
            box-shadow: -8px -8px 16px #1a2035, 8px 8px 16px #0a0d14;
        }
    </style>
</head>
<body class="min-h-screen py-8">

    <div class="max-w-4xl mx-auto px-6">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Confirmar Pagamento</h1>
            <button onclick="window.history.back()" class="text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-arrow-left"></i> Voltar
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            <!-- LEFT - TRIP SUMMARY -->
            <div class="lg:col-span-3 space-y-6">

                <div class="neumorph p-6">
                    <h2 class="font-semibold text-lg mb-4">Resumo da Viagem</h2>
                    <div class="flex gap-6">
                        <div class="flex-1">
                            <div class="text-sm text-gray-500">Partida</div>
                            <div class="font-semibold"><?= $ride['departure_time'] ?> • <?= $ride['origin'] ?></div>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-gray-500">Chegada</div>
                            <div class="font-semibold"><?= $ride['arrival_time'] ?> • <?= $ride['destination'] ?></div>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <div>
                            <div class="text-sm text-gray-500">Motorista</div>
                            <div class="font-semibold"><?= $ride['driver_name'] ?></div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-[var(--accent)]"><?= number_format($ride['price'], 0) ?> Kz</div>
                            <div class="text-xs text-gray-500">1 passageiro</div>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="neumorph p-6">
                    <h2 class="font-semibold text-lg mb-4">Método de Pagamento</h2>
                    
                    <div class="space-y-3">
                        <label class="payment-option flex items-center gap-4 p-4 border border-transparent hover:border-[var(--accent)] rounded-2xl cursor-pointer">
                            <input type="radio" name="payment" value="multicaixa" checked class="accent-[var(--accent)]">
                            <i class="fa-solid fa-credit-card text-2xl text-blue-600"></i>
                            <div class="flex-1">
                                <div class="font-medium">Multicaixa Express</div>
                                <div class="text-sm text-gray-500">Pagamento instantâneo</div>
                            </div>
                        </label>

                        <label class="payment-option flex items-center gap-4 p-4 border border-transparent hover:border-[var(--accent)] rounded-2xl cursor-pointer">
                            <input type="radio" name="payment" value="cash">
                            <i class="fa-solid fa-money-bill-wave text-2xl text-green-600"></i>
                            <div class="flex-1">
                                <div class="font-medium">Dinheiro (ao motorista)</div>
                                <div class="text-sm text-gray-500">Pagar no embarque</div>
                            </div>
                        </label>

                        <label class="payment-option flex items-center gap-4 p-4 border border-transparent hover:border-[var(--accent)] rounded-2xl cursor-pointer">
                            <input type="radio" name="payment" value="wallet">
                            <i class="fa-solid fa-wallet text-2xl text-purple-600"></i>
                            <div class="flex-1">
                                <div class="font-medium">Saldo CARPOOL</div>
                                <div class="text-sm text-green-600">12.450 Kz disponíveis</div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- RIGHT - SUMMARY + CONFIRM -->
            <div class="lg:col-span-2">
                <div class="neumorph p-6 sticky top-6">
                    <h3 class="font-semibold mb-4">Resumo do Pagamento</h3>
                    
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span>1 lugar × 1.400 Kz</span>
                            <span>1.400 Kz</span>
                        </div>
                        <div class="flex justify-between text-green-600">
                            <span>Desconto (10%)</span>
                            <span>-140 Kz</span>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-3 flex justify-between font-bold">
                            <span>Total</span>
                            <span class="text-xl">1.260 Kz</span>
                        </div>
                    </div>

                    <button onclick="confirmPayment()" 
                            class="mt-8 w-full py-5 bg-[var(--accent)] hover:bg-orange-600 text-white font-bold text-lg rounded-2xl transition-all flex items-center justify-center gap-3">
                        <i class="fa-solid fa-lock"></i>
                        Confirmar Pagamento
                    </button>

                    <p class="text-center text-xs text-gray-500 mt-6">
                        Ao confirmar, você aceita nossos <span class="text-blue-600">Termos de Serviço</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmPayment() {
            if (confirm("Confirmar pagamento de 1.260 Kz?")) {
                alert("✅ Pagamento realizado com sucesso!\n\nViagem reservada para Alexbruno.");
                setTimeout(() => {
                    window.location.href = "minhas-viagens.php";
                }, 1500);
            }
        }

        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
        }
    </script>
</body>
</html>