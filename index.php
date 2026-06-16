<?php
$year = date("Y");

$services = [
    ["Tworzenie stron", "Nowoczesne i responsywne strony internetowe.", "bi-window"],
    ["Projektowanie UI", "Estetyczne interfejsy dopasowane do użytkownika.", "bi-palette"],
    ["Bootstrap", "Szybkie budowanie stron przy pomocy gotowych komponentów.", "bi-bootstrap"]
];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaWeb Studio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#start">
                <i class="bi bi-stars"></i> NovaWeb Studio
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#start" class="nav-link">Start</a></li>
                    <li class="nav-item"><a href="#uslugi" class="nav-link">Usługi</a></li>
                    <li class="nav-item"><a href="#portfolio" class="nav-link">Portfolio</a></li>
                    <li class="nav-item"><a href="#kontakt" class="nav-link">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="start" class="hero text-center">
        <div class="container">
            

            <h1 class="display-3 fw-bold">Nowoczesna strona internetowa</h1>

            <p class="lead mt-3">
                Przykładowy projekt strony WWW wykorzystujący Header, Main, Footer oraz komponenty Bootstrap.
            </p>

            <div class="mt-4">
                <a href="#uslugi" class="btn btn-light btn-lg me-2">Zobacz więcej</a>
                <a href="#kontakt" class="btn btn-outline-light btn-lg">Kontakt</a>
            </div>
        </div>
    </section>
</header>

<main>

    <section class="container py-5" id="uslugi">
        <div class="text-center mb-5">
            <h2 class="section-title">Nasze usługi</h2>
            <p class="text-muted">
                Przykład kart Bootstrap wygenerowanych częściowo przez PHP.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($services as $service): ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow border-0 text-center p-4">
                        <div class="card-body">
                            <i class="bi <?= $service[2]; ?> icon-box"></i>
                            <h4 class="mt-3"><?= $service[0]; ?></h4>
                            <p class="text-muted"><?= $service[1]; ?></p>
                            <button class="btn btn-primary">Dowiedz się więcej</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-white py-5" id="portfolio">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">Dlaczego Bootstrap?</h2>
                <p class="lead">
                    Bootstrap pozwala szybko tworzyć estetyczne, responsywne i przejrzyste strony internetowe.
                    Poniżej pokazano przykładowe elementy oraz możliwości frameworka.
                </p>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="glass-progress mb-4" data-progress="90">
                        <div class="glass-fill"></div>
                        <span>HTML 90%</span>
                    </div>

                    <div class="glass-progress green mb-4" data-progress="80">
                        <div class="glass-fill"></div>
                        <span>Bootstrap 80%</span>
                    </div>

                    <div class="glass-progress yellow mb-4">
                        <div class="glass-fill"></div>
                        <span>PHP 65%</span>
                    </div>

                    <div class="alert alert-primary shadow mt-4">
                        <h4><i class="bi bi-info-circle"></i> Informacja</h4>
                        <p class="mb-0">
                            Ta strona pokazuje użycie systemu siatki Bootstrap, kart, przycisków,
                            formularza, paska postępu, alertów oraz responsywnej nawigacji.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bootstrap-orbit">
                <div class="orbit-center">
                    <i class="bi bi-bootstrap-fill"></i>
                    <h5>Bootstrap</h5>
                    <p>Najedź tutaj</p>
                </div>

                <div class="orbit-card orbit-1">
                    <i class="bi bi-grid-3x3-gap"></i>
                    <strong>Grid</strong>
                    <span>System kolumn i responsywny układ strony.</span>
                </div>

                <div class="orbit-card orbit-2">
                    <i class="bi bi-phone"></i>
                    <strong>Responsywność</strong>
                    <span>Dostosowanie strony do telefonu, tabletu i komputera.</span>
                </div>

                <div class="orbit-card orbit-3">
                    <i class="bi bi-ui-checks"></i>
                    <strong>Komponenty</strong>
                    <span>Gotowe przyciski, karty, alerty, formularze i menu.</span>
                </div>

                <div class="orbit-card orbit-4">
                    <i class="bi bi-brush"></i>
                    <strong>Stylowanie</strong>
                    <span>Szybkie nadawanie wyglądu przez klasy CSS.</span>
                </div>
            </div>

        </div>
    </section>

    <section class="container py-5" id="kontakt">
    <div class="text-center mb-5">
        <h2 class="section-title">Kontakt</h2>
        <p class="text-muted">Przykład działającego formularza kontaktowego Bootstrap.</p>
    </div>

    <?php if (isset($_GET['sent'])): ?>
        <div class="alert alert-success text-center shadow">
            Wiadomość została wysłana poprawnie.
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center shadow">
            Wystąpił błąd podczas wysyłania wiadomości. Sprawdź dane i spróbuj ponownie.
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="send.php" method="POST" class="card shadow border-0 p-4">
                <div class="mb-3">
                    <label class="form-label">Imię i nazwisko</label>
                    <input 
                        type="text" 
                        name="fullname" 
                        class="form-control" 
                        placeholder="Wpisz swoje imię i nazwisko"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Adres e-mail</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="example@email.com"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Wiadomość</label>
                    <textarea 
                        name="message" 
                        class="form-control" 
                        rows="5" 
                        placeholder="Napisz wiadomość"
                        required
                    ></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">
                    <i class="bi bi-send"></i> Wyślij wiadomość
                </button>
            </form>
        </div>
    </div>
</section>

</main>

<footer class="text-white text-center py-4">
    <div class="container">
        <h5 class="fw-bold">NovaWeb Studio</h5>
        <p class="mb-2">Przykładowa strona WWW wykonana z użyciem Bootstrap i PHP.</p>
        <p class="mb-0">&copy; <?= $year; ?> Wszystkie prawa zastrzeżone.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.querySelectorAll('.glass-progress').forEach(bar => {
    const value = bar.dataset.progress || 65;
    bar.style.setProperty('--progress', value);

    bar.addEventListener('mousemove', e => {
        const rect = bar.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const fill = bar.querySelector('.glass-fill');

        fill.style.setProperty('--mouse-x', `${x - 90}px`);
    });
});
</script>

</body>
</html>