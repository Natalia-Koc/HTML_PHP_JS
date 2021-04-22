-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Sie 2019, 13:40
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunki`
--

CREATE TABLE `gatunki` (
  `id` int(10) UNSIGNED NOT NULL,
  `gatunek` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gatunki`
--

INSERT INTO `gatunki` (`id`, `gatunek`) VALUES
(1, 'Literatura mÅ‚odziezowa'),
(2, 'Horror'),
(4, 'Thriller'),
(5, 'Klasyka'),
(6, 'Romans'),
(7, 'Przygodowa'),
(8, 'Literatura piÄ™kna'),
(9, 'Literatura obyczajowa'),
(10, 'Dramat'),
(11, 'KryminaÅ‚'),
(12, 'Sensacyjna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `katalog`
--

CREATE TABLE `katalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `okladka` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `tytul` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `ocena` int(100) NOT NULL DEFAULT '0',
  `opis` varchar(10000) COLLATE utf8_polish_ci NOT NULL,
  `idGatunku` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `katalog`
--

INSERT INTO `katalog` (`id`, `okladka`, `tytul`, `autor`, `ocena`, `opis`, `idGatunku`) VALUES
(8, '587914-352x500.jpg', 'To', 'Stephen King', 248, 'Najbardziej przeraÅ¼ajÄ…ca powieÅ›Ä‡ Kinga. TytuÅ‚owe To stanowi metaforÄ™ tkwiÄ…cego w ludziach zÅ‚a.   Derry w stanie Maine, miejsce ledwie widoczne na mapie. Dochodzi tu do wyjÄ…tkowej eskalacji zbrodni, okrutnych morderstw, gwaÅ‚tÃ³w i tajemniczych wypadkÃ³w. W kanaÅ‚ach miasteczka zalÄ™gÅ‚o siÄ™ To. BliÅ¼ej nieokreÅ›lone, przybiera najrÃ³Å¼niejsze postacie â€“ klauna, ogromnego ptaszyska, gÅ‚osu w rurach. Poluje na dzieci. Tylko dzieci potrafiÄ… dostrzec To. I dlatego wÅ‚aÅ›nie one stajÄ… do walki z potworem.  Mija dwadzieÅ›cia kilka lat i To powraca. Dzieci sÄ… juÅ¼ dorosÅ‚ymi, ale muszÄ… odnaleÅºÄ‡ w sobie dzieciÄ™cÄ… wiarÄ™, lojalnoÅ›Ä‡ i odwagÄ™, by skutecznie stawiÄ‡ mu czoÅ‚a.', 2),
(13, '730040-352x500.jpg', 'Tajemnice Joan', 'Jennie Rooney', 3, 'Na podstawie powieÅ›ci powstaÅ‚ film z Judi Dench i Sophie Cookson w rolach gÅ‚Ã³wnych.\r\n\r\nNietypowa powieÅ›Ä‡ szpiegowska o niemoÅ¼liwych do rozstrzygniÄ™cia dylematach moralnych i niezwykle trudnych decyzjach, ktÃ³re mogÄ… zawaÅ¼yÄ‡ na caÅ‚ym Å¼yciuâ€¦\r\n\r\nCambridge roku 1937 peÅ‚ne jest idei i idealistÃ³w, a Joan, ktÃ³ra dotÄ…d nie obracaÅ‚a siÄ™ w wielkim Å›wiecie, jest nimi wprost oczarowana. ZnajomoÅ›Ä‡ z przebojowymi SoniÄ… i Leo, studentami rosyjskiego pochodzenia, coraz bardziej siÄ™ zacieÅ›nia, ale gdy lata uniwersyteckie dobiegajÄ… koÅ„ca i rozpoczyna siÄ™ dorosÅ‚e Å¼ycie, trudno jest pozostaÄ‡ lojalnym w stosunku do dawnych przyjaciÃ³Å‚.\r\n\r\nNiemal siedemdziesiÄ…t lat pÃ³Åºniej Joan Stanley zostaje oskarÅ¼ona o zdradÄ™ paÅ„stwowÄ… i przekazywanie Å›ciÅ›le tajnych informacji Sowietom. Kobieta utrzymuje, Å¼e jej decyzja byÅ‚a podyktowana osobliwymi czasami wojny.\r\n\r\nJoan Stanley skrywa tajemnicÄ™.\r\n\r\nPrzez piÄ™Ä‡dziesiÄ…t lat byÅ‚a kochajÄ…cÄ… matkÄ…, czuÅ‚Ä… babciÄ…, we wtorkowe popoÅ‚udnia adeptkÄ… malowania akwarelami, a w czwartkowe uczestniczkÄ… zajÄ™Ä‡ tanecznych. AÅ¼ do pewnego sÅ‚onecznego wiosennego porankaâ€¦ KtoÅ› bowiem odkryÅ‚ jej latami tajonÄ… toÅ¼samoÅ›Ä‡.\r\n\r\nJoan Stanley byÅ‚a szpiegiem.', 4),
(14, '736449-352x500.jpg', 'NieobecnoÅ›Ä‡', ' Ewa Kopsik, Magdalena Piekorz', 213, 'OpowieÅ›Ä‡ o walce z chorobÄ…, ktÃ³rej przyglÄ…daÅ‚a siÄ™ caÅ‚a Polska. Historia inspirowana przeÅ¼yciami reÅ¼yserki Magdaleny Piekorz.\r\n\r\nW Å¼yciu uzdolnionej baletnicy wszystko zaczyna siÄ™ ukÅ‚adaÄ‡. Dostaje upragnionÄ… rolÄ™, spotyka mÄ™Å¼czyznÄ™, przy ktÃ³rym wreszcie czuje siÄ™ szczÄ™Å›liwa i kochana. Kres idylli przychodzi niespodziewanie. CiÄ™Å¼ka choroba przekreÅ›la wszystkie plany, odbiera sprawnoÅ›Ä‡ i wymarzonÄ… pracÄ™. Kolejni lekarze bezradnie rozkÅ‚adajÄ… rÄ™ce. Å»ycie mÅ‚odej kobiety zamienia siÄ™ w piekÅ‚o. W koÅ„cu sÅ‚yszy diagnozÄ™: borelioza. Do tragedii doprowadza ukÄ…szenie kleszcza sprzed 10 lat. Rozpaczliwa walka o Å¼ycie nie uznaje kompromisÃ³w i wystawia na prÃ³bÄ™ miÅ‚oÅ›Ä‡. Nie jest jednak silniejsza od chÄ™ci powrotu na scenÄ™.\r\n\r\nCzytaÅ‚em tÄ™ opowieÅ›Ä‡ jednym tchem. O czym ona? O tragedii choroby, co niszczy Å¼ycie, tak dobrze juÅ¼ uÅ‚oÅ¼one. Najgorsze, Å¼e to choroba niby fatum. Niszczy wszystko â€“ osobowoÅ›Ä‡, myÅ›lenie, uczucia, miÅ‚oÅ›Ä‡, przyjaÅºÅ„. SkÄ…d przychodzi? Jakby ze zÅ‚ej baÅ›ni, od ukÄ…szenia, ktÃ³rego nawet nie poczuliÅ›my. O tym â€“ a szczegÃ³lnie o rozpadaniu siÄ™ chorego psychicznie i fizycznie jest ta opowieÅ›Ä‡. Jest to takÅ¼e historia o braku zrozumienia dla tego, co siÄ™ z chorym dzieje. Bo nie tylko medycyna nie moÅ¼e siÄ™ w przerÃ³Å¼nych objawach rozeznaÄ‡, ale i przyjaciele, znajomi, najbliÅ¼si nie wytrzymujÄ…, nie rozumiejÄ… tej przemiany chorego. BÃ³l rozwala wszystko.\r\nAle jest to teÅ¼ opowieÅ›Ä‡ o nadziei. Przetrwaniu. Byciu na nowo. Ernest Bryll', 4),
(15, '352x500.jpg', 'Uciec przed cieniem ', 'Ewa Kopsik', 7, 'MÅ‚oda kobieta nie moÅ¼e znaleÅºÄ‡ swojego miejsca w Å›rodowisku Å›piewakÃ³w operowych, w ktÃ³rym z koniecznoÅ›ci obraca siÄ™, bÄ™dÄ…c Å¼onÄ… artysty. Ma zaniÅ¼onÄ… samoocenÄ™, cierpi na depresjÄ™ i lÄ™k przed utratÄ… bliskiej osoby. Nieprzystosowana do Å¼ycia jest emocjonalnie uzaleÅ¼niona od mÄ™Å¼a. WolnoÅ›Ä‡ urasta w jej oczach do rangi problemu. Coraz czÄ™Å›ciej dopada jÄ… ponure wspomnienie z dzieciÅ„stwa, ktÃ³re potÄ™guje zÅ‚y nastrÃ³j. Czy zdoÅ‚a przed nim uciec i zaczÄ…Ä‡ wszystko od nowa?\r\n\r\nKsiÄ…Å¼ka, nawiÄ…zujÄ…c do jungowskiego Cienia, zwraca uwagÄ™ na ponurÄ… i zÅ‚Ä… stronÄ™ charakteru czÅ‚owieka. Ukazuje mechanizm funkcjonowania wzorcÃ³w i archetypÃ³w oraz ich, czÄ™sto nieuÅ›wiadomiony, wpÅ‚yw na Å¼yciowe decyzje.', 4),
(19, '532904-352x500.jpg', 'Harry Potter i wiÄ™zieÅ„ Azkabanu', 'J.K. Rowling', 192, 'Z pilnie strzeÅ¼onego wiÄ™zienia dla czarodziejÃ³w ucieka niebezpieczny przestÄ™pca. Kim jest? Co go Å‚Ä…czy z Harrym? Dlaczego lekcje przepowiadania przyszÅ‚oÅ›ci stajÄ… siÄ™ dla bohatera udrÄ™kÄ…? W trzecim tomie przygÃ³d Harry`ego Pottera poznajemy nowego nauczyciela obrony przed czarnÄ… magiÄ…, oglÄ…damy Hagrida w nowej roli oraz dowiadujemy siÄ™ wiÄ™cej o przeszÅ‚oÅ›ci profesora Snape`a. Wyprawiamy siÄ™ rÃ³wnieÅ¼ wraz z trzecioklasistami do obfitujÄ…cego w atrakcje Hogsmeade, jedynej wioski w Anglii zamieszkanej wyÅ‚Ä…cznie przez czarodziejÃ³w.\r\nNowe wydanie ksiÄ…Å¼ki o najsÅ‚ynniejszym czarodzieju Å›wiata rÃ³Å¼ni siÄ™ od poprzednich nie tylko okÅ‚adkÄ…, ale i wnÄ™trzem â€“ po raz pierwszy na poczÄ…tku kaÅ¼dego tomu pojawi siÄ™ mapka Hogwartu i okolic, a poczÄ…tki rozdziaÅ‚Ã³w ozdobione bÄ™dÄ… specjalnymi gwiazdkami.', 1),
(20, 'i-metro-2033.jpg', 'Metro 2033', 'Dmitry Glukhovsky', 258, 'Rok 2033. W wyniku konfliktu atomowego Å›wiat ulegÅ‚ zagÅ‚adzie. Ocaleli tylko nieliczni, chroniÄ…cy siÄ™ w moskiewskim metrze, ktÃ³re dziÄ™ki unikalnej konstrukcji staÅ‚o siÄ™ najprawdopodobniej ostatnim przyczÃ³Å‚kiem ludzkoÅ›ci. Na mrocznych stacjach, rozÅ›wietlanych Å›wiatÅ‚ami awaryjnymi i blaskiem ognisk, ludzie ci prÃ³bujÄ… wieÅ›Ä‡ Å¼ycie zbliÅ¼one do tego sprzed katastrofy. TworzÄ… mikropaÅ„stwa spajane ideologiÄ…, religiÄ… czy po prostu ochronÄ… filtrÃ³w wodnychâ€¦ ZawierajÄ… sojusze, toczÄ… wojny.\r\n\r\nWOGN to wysuniÄ™ta najbardziej na pÃ³Å‚noc zamieszkaÅ‚a stacja metra. KiedyÅ› byÅ‚a jednÄ… z najpiÄ™kniejszych, a po zagÅ‚adzie przez dÅ‚ugi czas pozostawaÅ‚a bezpieczna. Teraz pojawiÅ‚o siÄ™ na niej Å›miertelne niebezpieczeÅ„stwo.', 7),
(21, '745684-352x500.jpg', 'Sherlock Holmes i sztuka we krwi', 'Bonnie MacBird', 3, 'LONDYN. ÅšNIEÅ»NY GRUDZIEÅƒ 1888.\r\nTrzydziestoczteroletni Sherlock Holmes, zaÅ‚amany pod ciÄ™Å¼arem wyrzutÃ³w sumienia, wraca do kokainy po katastrofalnym Å›ledztwie w sprawie Kuby Rozpruwacza. Nawet Watson nie potrafi przywrÃ³ciÄ‡ przyjacielowi chÄ™ci do Å¼ycia â€“ do momentu, gdy z ParyÅ¼a przychodzi dziwnie zaszyfrowany list.\r\nPiÄ™kna gwiazda francuskiego kabaretu pisze, Å¼e jej synek zniknÄ…Å‚, a ona zostaÅ‚a napadniÄ™ta na ulicach Montmartreâ€™u. Holmes rusza z Watsonem do ParyÅ¼a. I odkrywa, Å¼e sprawa moÅ¼e byÄ‡ powiÄ…zana z kradzieÅ¼Ä… bezcennego posÄ…gu i Å›mierciÄ… kilkorga dzieci... W tym wyÅ›cigu z czasem miÄ™dzy Londynem, ParyÅ¼em a odludnymi wzgÃ³rzami Lancashire, Holmes ma nie tylko zbyt wielu wrogÃ³w, lecz takÅ¼e rywali.\r\nCzy uda siÄ™ mu odnaleÅºÄ‡ chÅ‚opca i powstrzymaÄ‡ falÄ™ morderstw?\r\nI jakÄ… cenÄ™ za to zapÅ‚aci? Niebezpieczna gra trwa!', 5),
(22, 'tatuaz.jpg', 'Dziewczyna z tatuaÅ¼em.', 'Dan Burstein, Arne de Keijzer i inni...', 0, 'Pierwszy przewodnik po fascynujÄ…cym Å›wiecie najchÄ™tniej czytanych i najbardziej dyskutowanych powieÅ›ci kryminalnych ostatniego dziesiÄ™ciolecia. DoÅ›wiadczony duet autorski, ktÃ³ry stoi za bestsellerowymi leksykonami rozwiewajÄ…cymi tajemnice ksiÄ…Å¼ek Dana Browna, przy pomocy wieloletniego przyjaciela pisarza zebraÅ‚ w jednÄ… caÅ‚oÅ›Ä‡ elementy ukÅ‚adanki, jakÄ… jest zagadka niezwykÅ‚ej popularnoÅ›ci thrillerÃ³w szwedzkiego pisarza Stiega Larssona. UkazujÄ…ca siÄ™ w momencie premiery amerykaÅ„skiej ekranizacji pierwszego tomu serii, filmu pt. Dziewczyna z tatuaÅ¼em w reÅ¼. Davida Finchera, z Danielem Craigiem i Rooney MarÄ… w rolach gÅ‚Ã³wnych, ksiÄ…Å¼ka zawiera teksty rÃ³Å¼nych autorÃ³w, wnikliwe komentarze i interesujÄ…ce wywiady, ktÃ³re pozwalajÄ… zrozumieÄ‡ skomplikowane postaci Lisbeth Salander, Mikaela Blomkvista i samego Stiega Larssona oraz poznaÄ‡ genezÄ™ najwaÅ¼niejszych wÄ…tkÃ³w jego twÃ³rczoÅ›ci, w tym jej konteksty zwiÄ…zane z przemocÄ… wobec kobiet, neonazistami i szwedzkÄ… politykÄ…. WciÄ…gajÄ…cy, zaskakujÄ…cy, nieco prowokacyjny, ale satysfakcjonujÄ…cy intelektualnie niezbÄ™dnik dla wszystkich czytelnikÃ³w i widzÃ³w trylogii Millenium.', 11),
(23, 'woczach.jpg', 'W jego oczach', 'Alicja Sinicka', 0, 'W Å¼yciu Leny i Artura rozpoczyna siÄ™ nowy rozdziaÅ‚. WÅ‚aÅ›nie siÄ™ zarÄ™czyli po dwÃ³ch latach zwiÄ…zku. Nie wszyscy sÄ… z tego powodu zadowoleni, a sama Lena nie potrafi zostawiÄ‡ przeszÅ‚oÅ›ci za sobÄ…. WciÄ…Å¼ nie moÅ¼e pogodziÄ‡ siÄ™ z tym, Å¼e jej ukochany ma przed niÄ… mnÃ³stwo tajemnic.\r\nCzy tak powaÅ¼na decyzja nie powinna byÄ‡ podejmowana bez cienia wÄ…tpliwoÅ›ci? Czy Artur potrafi oddaÄ‡ siÄ™ jej caÅ‚kowicie i rozpocznÄ… wspÃ³lne Å¼ycie na nowych zasadach?\r\nKobieta nie ma pewnoÅ›ci, czy przebije siÄ™ przez mur, ktÃ³ry wzniÃ³sÅ‚ jej ukochany. Czy kiedykolwiek do koÅ„ca go pozna?', 6),
(25, 'brakOkladki.jpg', 'Rana', 'Wojciech Chmielarz', 0, 'Podobno czas leczy rany. Jednak niektÃ³re nigdy siÄ™ nie zabliÅºniajÄ….\r\n\r\nNajpierw pod koÅ‚ami pociÄ…gu ginie Marysia, uczennica ekskluzywnej prywatnej szkoÅ‚y na warszawskim Mokotowie. Jej nauczycielka, ElÅ¼bieta prÃ³buje odkryÄ‡, co siÄ™ naprawdÄ™ staÅ‚o. Rozpoczyna prywatne Å›ledztwo tylko po to, Å¼eby wkrÃ³tce sama zginÄ…Ä‡. Ale jej ciaÅ‚o znika, a jedynymi osobami, ktÃ³re cokolwiek widziaÅ‚y, sÄ… Gniewomir, nieprzystosowany spoÅ‚ecznie chÅ‚opak zafascynowany seryjnymi zabÃ³jcami, i Klementyna, samotna nauczycielka na Å¼yciowym zakrÄ™cie, ktÃ³rej wydaje siÄ™, Å¼e zdobywszy pracÄ™ w powaÅ¼anej szkole, los wreszcie siÄ™ do niej uÅ›miechnÄ…Å‚. Nic bardziej mylnego.\r\n\r\nÅ»adne z nich nie chce angaÅ¼owaÄ‡ siÄ™ w tÄ™ sprawÄ™ â€“ kaÅ¼de z nich ma swoje powody â€“ ale Å¼adne z nich nie ma wyjÅ›cia. Gdyby wiedzieli, dokÄ…d zaprowadzi ich to Å›ledztwo, nigdy by siÄ™ na to nie odwaÅ¼yli. SzkoÅ‚a okazuje siÄ™ peÅ‚na tajemnic. Podobnie jak pracujÄ…cy w niej nauczycieleâ€¦\r\n\r\nRana to bezlitosne studium zÅ‚a uÅ›pionego w zaciszu domowego ogniska. NiepokojÄ…ce i mroczne, odsÅ‚ania najgÅ‚Ä™biej skrywane tajemnice, o ktÃ³rych nikt nie chce mÃ³wiÄ‡. Nowa powieÅ›Ä‡ jednego z najwyÅ¼ej ocenianych i najchÄ™tniej czytanych wspÃ³Å‚czesnych pisarzy odziera z wszelkich zÅ‚udzeÅ„.', 11),
(26, 'horyzont.jpg', 'Horyzont', 'Jakub MaÅ‚ecki', 1, 'JaÅ‚owe lata bez wschodÃ³w i zachodÃ³w sÅ‚oÅ„ca. Wspomnienia jak burza piaskowa, jak skrzypienie desek w starym domu. Smugi przeszÅ‚oÅ›ci pÅ‚ytko pod skÃ³rÄ…. Gry komputerowe i buÅ‚garski rap.\r\n\r\nManiek i Zuza mieszkajÄ… po sÄ…siedzku na warszawskim Mokotowie. On, byÅ‚y saper, prÃ³buje spisaÄ‡ wspomnienia z misji w Afganistanie, majÄ…c nadziejÄ™ wreszcie stamtÄ…d wrÃ³ciÄ‡. Ona, dziecko pokolenia Y, uczy siÄ™ Å¼yÄ‡ na wÅ‚asny rachunek i mimowolnie zatraca siÄ™ w rodzinnej tajemnicy. ChoÄ‡ z pozoru nic ich nie Å‚Ä…czy, ciÄ…Å¼Ä… ku sobie, niezdolni i niechÄ™tni do pielÄ™gnowania wiÄ™zi z otoczeniem.\r\n\r\nNowa ksiÄ…Å¼ka Jakuba MaÅ‚eckiego to zaskakujÄ…ca opowieÅ›Ä‡ o tÄ™sknocie, przyjaÅºni i odwadze. O konfrontacji z zadrÄ… â€“ wÅ‚asnÄ… i cudzÄ…. O prÃ³bach znalezienia wÅ‚aÅ›ciwej wersji siebie.', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(10) UNSIGNED NOT NULL,
  `idBook` int(10) UNSIGNED NOT NULL,
  `tresc` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUser` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id`, `idBook`, `tresc`, `data`, `idUser`) VALUES
(7, 14, 'Od jednego ukÄ…szenia po najwiÄ™kszy dramat. W najczarniejszych scenariuszach nie chciaÅ‚abym byÄ‡ w tej sytuacji. KsiÄ…Å¼ka o chorobie - tak, ale to teÅ¼ historia o tym co siÄ™ w naszym Å¼yciu zmienia. Co dzieje siÄ™ z relacjami, a wreszcie z osobÄ… chorÄ… o braku zrozumienia i o tym jak nauczyÄ‡ siÄ™ funkcjonowaÄ‡. ', '2019-08-29 10:49:49', 8),
(8, 8, 'KsiÄ…Å¼ka idealna na zimowe wieczory, mrozi krew w Å¼yÅ‚ach. Stephen King idealnie buduje atmosferÄ™ grozy, powodujÄ…c , Å¼e kaÅ¼da nastÄ™pna strona wymaga od nas odwagi. W miasteczku Derry majÄ… miejsce liczne morderstwa, niestety nikt nie potrafi rozwikÅ‚aÄ‡ kim jest morderca. Miasteczko zamieszkuje grupka przyjaciÃ³Å‚, kaÅ¼dej osobie z grupy ukazuje siÄ™ jej najwiÄ™kszy lÄ™k. Kiedy dociera do nich fakt ,Å¼e wizje lÄ™kÃ³w majÄ… wiÄ™cej wspÃ³lnego z realnoÅ›ciÄ… i faktycznÄ… moÅ¼liwoÅ›ciÄ… Å›mierci, niÅ¼ tylko dzieciÄ™cÄ… wyobraÅºniÄ… muszÄ… stawiÄ‡ czoÅ‚a mrocznej postaci.', '2019-08-29 10:49:55', 9),
(11, 8, 'â€žToâ€ jest uwaÅ¼ana za jednÄ… z najstraszniejszych ksiÄ…Å¼ek Kinga. Jest to rewelacyjna powieÅ›Ä‡, ktÃ³ra potrafi odkryÄ‡ prawdziwe zÅ‚o drzemiÄ…ce w czÅ‚owieku. Lektura wciÄ…ga od pierwszej do ostatniej strony i pochÅ‚ania siÄ™ jÄ… niemal jednym tchem. Czym tak naprawdÄ™ jest zÅ‚o i w jaki sposÃ³b moÅ¼na z nim walczyÄ‡? Czym jest tytuÅ‚owe â€žToâ€, ktÃ³re przybyÅ‚o z przepastnych, nieznanych czeluÅ›ci? Na te, jak i inne pytania odpowie Wam niniejsza niesztampowa powieÅ›Ä‡, ktÃ³ra potrafi przeraziÄ‡, aÅ¼ do szpiku koÅ›ci.', '2019-08-29 10:50:02', 14),
(12, 13, 'Å»ycie Joan Stanley to zagadka. PodjÄ™te w mÅ‚odoÅ›ci decyzje dajÄ… o sobie znaÄ‡, kiedy kobieta jest juÅ¼ na emeryturze. Pewnego dnia zostaje oskarÅ¼ona o zdradÄ™ paÅ„stwowÄ… i przekazywanie Å›ciÅ›le tajnych informacji Sowietom. Od tego momentu historia biegnie dwutorowo. Poznajemy dalsze wydarzenia po oskarÅ¼eniu kobiety, a pÃ³Åºniej Joan, wracajÄ…c wspomnieniami do przeszÅ‚oÅ›ci, opowiada historiÄ™ swojego Å¼ycia.', '2019-08-29 10:50:09', 8),
(14, 14, 'Bardzo podziwiam bohaterkÄ™, za przejÅ›cie tak strasznej choroby. Nie wyobraÅ¼am sobie byÄ‡ w takiej sytuacji. Historia o tym, jak choroba moÅ¼e zniszczyÄ‡ Å¼ycie, osoby ktÃ³ra bardzo ciÄ™Å¼ko pracowaÅ‚a aby to Å¼ycie poukÅ‚adaÄ‡. Choroba jak jeden podmuch, zniszczyÅ‚a to wszystko. Choroba, ktÃ³ra niszczy czÅ‚owieka ale niszczy rÃ³wnieÅ¼ inne pÅ‚aszczyzny Å¼ycia. Niesamowicie poruszajÄ…ca ksiÄ…Å¼ka, porusza wszystkie struny w naszym ciele i gra na emocjach. Polecam.', '2019-08-29 10:50:16', 9),
(23, 20, 'BrakowaÅ‚o mi postaci kobiecych, ktÃ³re miaÅ‚yby znaczenie. ByÄ‡ moÅ¼e w kolejnych tomach siÄ™ jakaÅ› pojawi, a przynajmniej takÄ… mam nadziejÄ™.\r\nW tym wydaniu wypatrzyÅ‚am kilka chochlikÃ³w drukarskich.', '2019-08-29 10:50:29', 9),
(28, 20, 'Przez dÅ‚uÅ¼szy czas miaÅ‚am wraÅ¼enie, Å¼e czytam dzieÅ‚o nastolatka, ktÃ³ry nie tylko musiaÅ‚ wyobraziÄ‡ sobie Å¼ycie w postapokaliptycznym Å›wiecie, ale i dorosÅ‚e relacje miÄ™dzyludzkie. ', '2019-08-30 11:20:56', 14),
(30, 20, 'Przed przeczytaniem ksiÄ…Å¼ki przeszedÅ‚em wszystkie czÄ™Å›ci gier Metro (2033, Last Light i Exodus) i przyznajÄ™ Å¼e podchodziÅ‚em do niej z pewnym uprzedzeniem. \r\nMimo Å¼e gry bardzo lubiÄ™, nigdy nie uwaÅ¼aÅ‚em Å¼e fabularnie sÄ… jakiejÅ› wyjÄ…tkowe, ceniÅ‚em w nich mroczny i gÄ™sty klimat, strzelanie byÅ‚o niezÅ‚e, fabuÅ‚a gdzieÅ› tam sobie byÅ‚a ale wÅ‚aÅ›ciwie to tyle. No ale jednak gry i ksiÄ…Å¼ki sÄ… zupeÅ‚nie innym rodzajem rozrywki, o czym zdÄ…Å¼yÅ‚em zapomnieÄ‡ i ta ksiÄ…Å¼ka okazaÅ‚a siÄ™ tego idealnym przykÅ‚adem. ', '2019-08-30 11:21:59', 14),
(31, 23, 'Po dwÃ³ch latach zwiÄ…zek dwÃ³jki ludzi, ludzi ktÃ³rzy siÄ™ kochajÄ… powinien byÄ‡ zdecydowanie silniejszy i zbudowany na zaufaniu. Tu niestety brakuje jednego ja i drugiego a dodatkowo jest ktoÅ› trzeci, ktÃ³ry chce zaszkodziÄ‡ i rozdzieliÄ‡ LenÄ™ i Artura. \r\nArtur jak wiecie z poprzedniej czÄ™Å›ci trudni siÄ™ w biznesie chemiczno-farmaceutycznym, ale nie dopuszcza Leny wystarczajÄ…co blisko. Ona czuje siÄ™ wyobcowana i odepchniÄ™ta. A potem pojawia siÄ™...', '2019-08-30 11:23:21', 14);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idBook` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ulubione`
--

INSERT INTO `ulubione` (`id`, `idUser`, `idBook`) VALUES
(107, 8, 8),
(112, 8, 13),
(114, 8, 14),
(128, 9, 15),
(129, 14, 8),
(130, 14, 20),
(131, 9, 8),
(132, 9, 14),
(133, 9, 20),
(134, 9, 21),
(136, 9, 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nick` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `rola` varchar(20) COLLATE utf8_polish_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `nick`, `imie`, `nazwisko`, `email`, `haslo`, `avatar`, `rola`) VALUES
(8, 'Tala', 'Natalia', 'KoÄ‡', 'natalia-koc@o2.pl', 'tala', '198123_grafika-kobieta-kolorowa-farba-2d.jpg', 'user'),
(9, 'test', 'Natalia', 'KoÄ‡', 'borysbestia1214@wp.pl', 'test', '2018-19-12-21-53-37.jpeg', 'admin'),
(14, 'RemiMalek', 'Remi', 'Malek', 'RemiMalek@onet.pl', 'malek', 'thumb-1920-801770.jpg', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKategorii` (`idGatunku`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPosta` (`idBook`) USING BTREE,
  ADD KEY `idUser` (`idUser`);

--
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idBook` (`idBook`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `katalog_ibfk_1` FOREIGN KEY (`idGatunku`) REFERENCES `gatunki` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`idBook`) REFERENCES `katalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarze_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `ulubione_ibfk_1` FOREIGN KEY (`idBook`) REFERENCES `katalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulubione_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
