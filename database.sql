-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2019 at 01:15 AM
-- Server version: 5.6.45-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmsinrs_diplomski`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `title_blog` text COLLATE utf8_unicode_ci NOT NULL,
  `text_blog` text COLLATE utf8_unicode_ci NOT NULL,
  `date_blog` int(11) NOT NULL,
  `pic_blog` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `title_blog`, `text_blog`, `date_blog`, `pic_blog`) VALUES
(1, '379 modela Persol naočara na jednom mestu!', 'U petak 27.10.2017 od 15h do 21h i subotu 28.10.2017 od  9h do 16h imaćete jedinstvanu priliku da na jednom mestu vidite i probate 379 različitih modela Persola naočare.', 1508248525, 'persol-379-b0.jpg'),
(7, 'Oštar vid na svim udaljenostima sa jednim naočarima!', 'Prezbiopija je fiziološko stanje koje se ispoljava mutnim vidom na blizinu i obično se javlja oko četrdesete godine života. Rešenje za ovo stanje su naočare za čitanje, bifokalne naočare ili sve češće multifokalne/progresivne naočare. Progresivna sočiva nude mekan prelaz od vida na daljinu, preko vida na srednjoj udaljenosti do vida na blizinu pokrivajući i sve ostale potrebne korekcije što znači da ceo dan možete da funkcionišete sa jednim naočarima, a da imate bistar vid za sve udaljenosti. U ponudi se nalazi više generacija progresiva, a glavna razlika je u komfornosti, odnosno u širini vidnog polja. S DESIGN je trenutno najnoviji i najkomforniji progresiv u Essilor-ovoj ponudi.', 1508248525, 'progresivna-sociva.jpg'),
(8, 'Testiranje optičkih sočiva u 3D virtuelnom okruženju', 'Essilor je pokretač 3D virtualne stvarnosti pod nazivom NAUTILUS. NAUTILUS je najnovija generacija demonstracije optičkih sočiva. Dizajniran je da se koristi u praksi. Uređaj je napravljen da pomogne korisnicima pri izboru sočiva. Koristeći NAUTILUS pacijenti vide praktično testiranje optičkih sočiva,tako što su potpuno uronjeni u 3D virtuelno okruženje i imaju prikaz interaktivnih scena na 360&deg; u prostoru. Jasno vide razlike u dizajnu progresivnih sočiva,tj razlike u širini progresivnih kanala. Može se videti prikaz polarizovanih i fotoosetljivih sočiva i razlike u kvalitetu slike u odnosu na stepen zaštite koji je nanet na sočivo (npr otpornost na grebanje,brzo odmagljivanje,odbljesak koji sveden na minimim itd).', 1508248525, 'essilor-nautilus.jpg'),
(9, 'WAITING FOR THE SUN', 'Waiting for the Sun (čekajući sunce), je mnogo više od običnog brenda sunčanih naočara: Waiting for the Sun je priča o prijateljima koji su 2007 prihvatili izazov i napravili sunčane naočare od drveta.\r\nWaiting for the Sun se pravi od prirodnog materijala i nastao je kao refleksija o urbanom svakodnevnom životu. Waiting for the Sun je izraz modernih, sofisticiranih i opuštenih gradskih ljudi.\r\nPredstavlja spoj modernog trenda i vintidž inspiracije, mešavinu kalifornijskog opuštenog stila i francuske sofisticiranosti.\r\nU ovom duhu je W/SUN lansirao svoju kolekciju, inspirisanu klasičnim oblicima koji su dizajneri reinterpretirali. Sve naočare za sunce su pakovane u drvenim kutijama.\r\nZa samo dve godine Waiting for the Sun je postao jedinstveni brend sa svojim unikatnim i originalnim proizvodima.\r\nW/SUN je projekat koji se stalno razvija, inspirisan energijom i svežinom kreativnosti. Svoj izraz nalazi u konstantnom inovativnom istraživanju.\r\nDanas Waiting for the Sun je dostupan u posebnim radnjama širom sveta i ima svoju prvu koncept prodavnicu WAIT u Parizu – all about City surfers.\r\nOkoiOko je prepoznalo svoj urbani stil u ovom projektu i ekskluzivni je distributer za teritoriju Srbije.', 1508248525, '2.jpg'),
(10, 'Novo u OkoiOko optici Silhouette - titan minimal art', 'Silhouette Brend - Nastao 1964. godine u Austriji, Silhouette je danas vodeći brend. Pod ovim imenom proizvode se najlakše naočare na svetu, sa ljubavlju i ručnom izradom, koristeći najbolje materijale i poslednju tehnologiju. Proizvode se u Austriji i izvoze širom sveta. Svojom lakoćom, Silhouette je napravio revoluciju na tržištu pre 10 godina. Danas, Silhouette se zvanično koristi u NASA misijama, koriste ih članovi Bečke Filharmonije i mnoga poznata imena iz sveta biznisa, politike i zabave.\nSilhouette naočare ne opterećuju nos I ne stežu iza ušiju. Napravljene od Hi-tech titanijuma, savitljive su i uvek savršeno stoje. I ako se jedva osećaju na licu, izuzetno su izdržljive. Ukratko, Sithouette naočare su tu zbog nas, a ne mi zbog njih. Lakoća sa kojom se nose je njihova suština.\n<br>\nOseti Lakoću Pokaži Stil - \"Savršenstvo se postiže, ne kada se još nešto može dodati, već kada se ništa više ne može oduzeti.\" Antoine de Saint-Exupery\nBez obzira gde pogledate, minimalizam je danas svuda. U vremenu kada je praktično sve tehnički moguće, lakoća i elegantna stuktura nisu više samo obećanje, već realnost. Manje je više. Biti oslobođen viška znači bolji kvalitet života.\nTo važi i za težinu, ne samo ličnu težinu, već svega što nas okružuje. Stoga je dizanjn lišen svega onoga što je teško.\nNakon godina u kojima se dodavala težina, proizvođači automobila su stavili svoje proizvode na dijetu i predstavili nove modele koji su značajno lakši zbog materijala kao što su aluminijum, karbonska vlakna i pojačana termoplastika. Dizajneri smanjuju stolice, stolove i police da drze minimum i to sa svega nekoliko delova.Nameštaj je redak. Samo transparentni, lagani objekti u prostoru. Kroz izuzetno lake, inovativne materijale, odeća za sport je postala izdržljiva, vodootporna i ona koja diše, uspešna simbioza lakoće i optimalne funkcije.\nNeke stvari su izostavljene danas koje su još juče izgledale nemoguće. Mi komprimujemo čitave police knjiga u eBook knjige, oslobađajući sebe tereta papira. Naš pametni telefon je telefon, kompjuter, MP3 plejer i fotografski aparat sve u jednom.\nMinimalizam je suština našeg stila života sa ciljem da se oslobodimo svega onoga što nam uzalud troši vreme. Danas gradimo delimčno montažne kuće, jer njihova izgradnja štedi vreme. Kada idemo u centar grada, umesto svojim kolima, idemo peške ili biciklom. Traženje parkinga jednostavno nije vredno muka….. ( preuzeto iz PR teksta Silhouette)', 1508248525, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id_company` int(11) NOT NULL,
  `name_company_1` text COLLATE utf8_unicode_ci NOT NULL,
  `name_company_2` text COLLATE utf8_unicode_ci NOT NULL,
  `address_company` text COLLATE utf8_unicode_ci NOT NULL,
  `city_company` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_company` text COLLATE utf8_unicode_ci NOT NULL,
  `mail_company` text COLLATE utf8_unicode_ci NOT NULL,
  `working_days_company` text COLLATE utf8_unicode_ci NOT NULL,
  `working_time_company` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id_company`, `name_company_1`, `name_company_2`, `address_company`, `city_company`, `phone_company`, `mail_company`, `working_days_company`, `working_time_company`) VALUES
(0, 'Eye', 'Care', '27. Marta 24', 'Beograd', '+381113252152', 'office.eye.care@mms.in.rs', 'Ponedeljak - Subota', '09h do 20h');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `name_customer` text COLLATE utf8_unicode_ci NOT NULL,
  `year_customer` text COLLATE utf8_unicode_ci,
  `phone_customer` text COLLATE utf8_unicode_ci,
  `email_customer` text COLLATE utf8_unicode_ci,
  `note_customer` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `name_customer`, `year_customer`, `phone_customer`, `email_customer`, `note_customer`) VALUES
(1, 'Lager', NULL, NULL, NULL, NULL),
(2, 'Pera Perić', '1985', '+381658945781', 'jabihda@gmail.com', ''),
(4, 'Mika Mikić', '1974', '', 'jabihda@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `designs_lenses`
--

CREATE TABLE `designs_lenses` (
  `id_design_lens` int(11) NOT NULL,
  `name_design_lens` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designs_lenses`
--

INSERT INTO `designs_lenses` (`id_design_lens`, `name_design_lens`) VALUES
(1, 'Hilux'),
(5, 'Nulux');

-- --------------------------------------------------------

--
-- Table structure for table `diameter_lenses`
--

CREATE TABLE `diameter_lenses` (
  `id_diameter_lens` int(11) NOT NULL,
  `name_diameter_lens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diameter_lenses`
--

INSERT INTO `diameter_lenses` (`id_diameter_lens`, `name_diameter_lens`) VALUES
(6, 65),
(7, 70),
(8, 60),
(9, 75),
(10, 80);

-- --------------------------------------------------------

--
-- Table structure for table `distance_proximity`
--

CREATE TABLE `distance_proximity` (
  `id_distance_proximity` int(11) NOT NULL,
  `name_distance_proximity` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `distance_proximity`
--

INSERT INTO `distance_proximity` (`id_distance_proximity`, `name_distance_proximity`) VALUES
(1, 'Daljina'),
(2, 'Blizina');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id_equipment` int(5) NOT NULL,
  `submenu_equipment` text COLLATE utf8_unicode_ci NOT NULL,
  `title_equipment` text COLLATE utf8_unicode_ci NOT NULL,
  `text_equipment` text COLLATE utf8_unicode_ci NOT NULL,
  `link_equipment` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_equipment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id_equipment`, `submenu_equipment`, `title_equipment`, `text_equipment`, `link_equipment`, `pic_equipment`) VALUES
(1, 'Lampa', 'Biomikroskop Haag-Streit BP 900 Led', 'Spalt lampa najnovije generacije koja poseduje izvor hladnog svetla za poboljsanu vizuelizaciju sa tri moguca uvelicanja 10, 16 I 25 x.', 'http://www.haag-streit.com/products/slitlamp/slit-lamp-bp-900r.html', 'bio-mikroskop.jpg'),
(2, 'Kamera', 'Camera Modul CM 900', 'Uz poseban softwear EyeSuite omogućava slikanje oka, dokumentovanje i precizno praćenje promena.', 'https://www.haag-streit.com/products/imaging-solutions/bp-900r-imaging.html', 'bp-900.jpg'),
(3, 'Očni pritisak', 'Aplanacioni tonometar - Goldmann', 'Najpouzdanije merenje očnog pritiska.', 'https://www.haag-streit.com/haag-streit-usa/haag-streit-products/tonometers/goldmann.aspx', 'aplanacioni-tonometar.jpg'),
(4, 'Kerato-refraktometar', 'Luneau 80+ wave', 'Aparat najnovije generacije koji u svoju analizu uključuje podatke Shack - Hartmann-ovog wavefront senzora. Korišćenjem Luneau 80, dobijaju se najprecizniji rezultati ove vrste u oftalmologiji.\r\nAuto kerato-refraktometrija - automatsko merenje zakrivljenosti rožnjače i refrakcije. Meri se na usku i široku zenicu čime se može dobiti pouzdan podatak vezan za vrednost refrakcije u noćnim uslovima.\r\nKornealna topografija - preko 100 000 tačaka rožnjače se mapira, kodirana šema omogućava preciznu dijagnozu odredjenih tipova promena na rožnjači (keratoconus, promenjena rožnjača kod dugogodišnjih nosioca tvrdih polu tvrdih kontaktnih sočiva, itd.)\r\nProgram za fitovanje kontakntih sočiva koji omogućava kreiranje sočiva prema obliku datog oka.\r\nAberometrija (visoke gustine - 1500 tačaka) - precizno odredjivanje odnosa LOA (aberacija niskog reda) I HOA (aberacija visokog reda) pruža uvid u sofisticiranu analizu kvaliteta vida i omogućava pripremu i praćenje hirurgije skidanja dioptrije.\r\nMerenje obima akomodacije.', 'http://carletonltd.com/products/corneal/topography/luneau-l80-four-one-autorefractor-keratometer-corneal-topographer-aberro', 'luneau-l80.jpg'),
(5, 'Vidno polje', 'Haag-Streit Octopus 900', 'Najsavremenije vidno polje obuhvata standardno W/W testiranje (beli stimulus na beloj podlozi), Goldmann-ovo kinetičko vidno polje kao i specijalne dijagnostičke metode za rano otkrivanje glaukoma (plavi stimulus na žutoj podlozi, SWAP - short wavelength automated perimetry i Flicker (critical flicker fusion perimetry). Postoje posebne strategije testiranja za slabovide. Test (full treshold) traje samo 2.30 minuta čime je izuzetno pogodan za testiranje starijih i dece. Poseduje pravu kontrolu fiksacije i automatizovani Eye Tracking.', 'https://www.haag-streit.com/products/perimetry/octopusr-900.html', 'octopus-900.jpg'),
(6, 'Optotip', 'Visionix L40', '22\" monitor sa dinamičkom polarizacijom. Različiti optotipi za odrasle i decu. Kontrastna senzitivnost. Kolorni vid-Ishihara test. Test binokularnog vida itd.', 'http://www.nanatech.com/index.php?page=l40pdisplay', 'visionix-l400.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `id_exchange` int(11) NOT NULL,
  `amount_exchange` int(11) NOT NULL,
  `default_amount_exchange` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`id_exchange`, `amount_exchange`, `default_amount_exchange`) VALUES
(11, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `finishing_lenses`
--

CREATE TABLE `finishing_lenses` (
  `id_finishing_lens` int(11) NOT NULL,
  `name_finishing_lens` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finishing_lenses`
--

INSERT INTO `finishing_lenses` (`id_finishing_lens`, `name_finishing_lens`) VALUES
(2, 'BLC'),
(3, 'SHV'),
(8, 'HVLL'),
(10, 'HC');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id_form` int(11) NOT NULL,
  `number_form` int(8) NOT NULL,
  `date_form` int(11) NOT NULL,
  `pd_form` int(11) DEFAULT NULL,
  `distance_od_sph_form` text COLLATE utf8_unicode_ci NOT NULL,
  `distance_od_cyl_form` text COLLATE utf8_unicode_ci,
  `distance_od_ax_form` text COLLATE utf8_unicode_ci,
  `distance_os_sph_form` text COLLATE utf8_unicode_ci NOT NULL,
  `distance_os_cyl_form` text COLLATE utf8_unicode_ci,
  `distance_os_ax_form` text COLLATE utf8_unicode_ci,
  `frame_form` text COLLATE utf8_unicode_ci,
  `frame_price_form` decimal(10,0) DEFAULT NULL,
  `frame_discount_form` int(3) DEFAULT NULL,
  `lens_producer_form` text COLLATE utf8_unicode_ci,
  `lens_material_form` text COLLATE utf8_unicode_ci,
  `lens_type_form` text COLLATE utf8_unicode_ci,
  `lens_designe_form` text COLLATE utf8_unicode_ci,
  `lens_index_form` text COLLATE utf8_unicode_ci,
  `lens_name_form` text COLLATE utf8_unicode_ci,
  `lens_finishing_form` text COLLATE utf8_unicode_ci,
  `lens_diameter_lens` int(11) NOT NULL,
  `lens_price_form` decimal(10,2) DEFAULT NULL,
  `lens_discount_form` int(3) DEFAULT NULL,
  `add_form` decimal(10,2) DEFAULT NULL,
  `advance_payment_form` int(11) DEFAULT NULL,
  `id_seller` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_exchange` int(11) NOT NULL,
  `id_distance_proximity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id_form`, `number_form`, `date_form`, `pd_form`, `distance_od_sph_form`, `distance_od_cyl_form`, `distance_od_ax_form`, `distance_os_sph_form`, `distance_os_cyl_form`, `distance_os_ax_form`, `frame_form`, `frame_price_form`, `frame_discount_form`, `lens_producer_form`, `lens_material_form`, `lens_type_form`, `lens_designe_form`, `lens_index_form`, `lens_name_form`, `lens_finishing_form`, `lens_diameter_lens`, `lens_price_form`, `lens_discount_form`, `add_form`, `advance_payment_form`, `id_seller`, `id_customer`, `id_exchange`, `id_distance_proximity`) VALUES
(1, 123, 1566664640, 65, '+1.25', '+1.00', '10', '+1.25', '+1.00', '50', 'Neki okvir', 10000, 10, 'HOYA D.O.O.', 'Organska plastika', 'Progresivi', 'Nulux', '1.60', 'iD MyStyle V+ 11mm', 'BLC', 75, 336.80, 10, 2.00, 10000, 6, 2, 11, 1),
(2, 123, 1568762079, 64, '-1.50', '+1.00', '10', '-1.25', '+1.00', '40', 'Neki okvir', 10000, 10, 'HOYA D.O.O.', 'Organska plastika', 'Progresivi', 'Nulux', '1.60', 'iD LifeStyle V+ X-Act 14mm Sensity', 'BLC', 65, 332.35, 10, 2.25, 10000, 6, 4, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `index_lenses`
--

CREATE TABLE `index_lenses` (
  `id_index_lens` int(11) NOT NULL,
  `name_index_lens` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `index_lenses`
--

INSERT INTO `index_lenses` (`id_index_lens`, `name_index_lens`) VALUES
(1, '1.50'),
(12, '1.60'),
(13, '1.53 PNX'),
(14, '1.74'),
(15, '1.67');

-- --------------------------------------------------------

--
-- Table structure for table `list_site`
--

CREATE TABLE `list_site` (
  `id_list_site` int(11) NOT NULL,
  `item_list_site` text COLLATE utf8_unicode_ci NOT NULL,
  `id_text_site` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_site`
--

INSERT INTO `list_site` (`id_list_site`, `item_list_site`, `id_text_site`) VALUES
(1, 'Specijalistički pregled (opšti pregled, merenje očnog pritiska, pregled očnog dna)', 2),
(2, 'Proveru vida i prepisivanje potrebne korektivne dioptrije', 2),
(3, 'Širenje zenica kod dece i odredjivanje objektivne refrakcije u cikloplegiji', 2),
(4, 'Testove za suvo oko (Schirmer, BUT, Lissamine Green)', 2),
(5, 'Kompjuterizovano vidno polje (KVP)', 2),
(6, 'Goldmann-ovo kinetičko vidno polje', 2),
(7, 'Specijalne dijagnostičke metode za rano otkrivanje glaukoma (SWAP i Flicker)', 2),
(8, 'Topografiju rožnjače', 2),
(9, 'Wavefront aberometriju oka', 2),
(10, 'Analizu brisa oka sa antibiogramom', 2),
(11, 'Manje intervencije na kapcima', 2),
(12, 'prvi pregled za odredjivanje tipa, dizajna i jačine potrebnog kontaktnog sočiva', 3),
(13, 'redovne preglede i praćenje nosioca kontaktnih sočiva', 3),
(14, 'rešavanje eventualnih komplikacija uzrokovanih nošenjem kontaktnih sočiva', 3),
(17, 'Saradjujemo sa proizvodjačima najboljih dioptrijskih stakala u svetu i zemilji. Bilo da su Vam potrebna lagana i estetski prihvatljiva stakla, stakla otporna na lom, manji odbljesak ili visoka zaštita od UV zračenja (E-SPF: eye sun protection factor), bićemo u mogućnosti da pruzimo stručan savet i rešimo zahtev.', 1),
(18, 'EyeCare optika ima zaposlenog savremeno edukovanog optičara koji će sa entuzijazmom pristupiti rešavanju i najmanjeg problema. Posedujemo kvalitetan alat kao i lager rezervnih delova.', 1),
(19, 'Eye Care optika je obogatila svoju laboratoriju Essilor mašinama najnovije generacije: Mr Orange i Mr Blue skener. Zahvaljujući mnogobrojnim opcijama ovih mašina u mogućnosti smo da vam garantujemo vrhunsku preciznost ugradnje svih vrsta stakala u sve vrste ramova.', 1),
(20, 'MR ORANGE - Ova savršena mašina brusi, narezuje, buši i polira sve vrste materijala od kojih se proizvode sočiva (stakla).', 1),
(21, 'LENSMETER VISIONIX VL3000 - Lensmeter Visionix VL3000 omogućava brzo merenje jačine ugradjenih stakala/plastike odnosno polu tvrdih kontaktnih sočiva i automatsko skeniranje progresivnih naočara.', 1),
(24, 'sdf2', 4),
(27, 'asdd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `material_lenses`
--

CREATE TABLE `material_lenses` (
  `id_material_lens` int(11) NOT NULL,
  `name_material_lens` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `material_lenses`
--

INSERT INTO `material_lenses` (`id_material_lens`, `name_material_lens`) VALUES
(1, 'Organska plastika');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `name_menu` text COLLATE utf8_unicode_ci NOT NULL,
  `path_menu` text COLLATE utf8_unicode_ci NOT NULL,
  `visitor` int(2) NOT NULL,
  `admin` int(2) NOT NULL,
  `user` int(2) NOT NULL,
  `parent` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `path_menu`, `visitor`, `admin`, `user`, `parent`) VALUES
(1, 'Početna', 'pocetna', 1, 0, 0, 0),
(2, 'Optika', 'optika', 1, 0, 0, 0),
(3, 'Ordinacija', 'ordinacija', 1, 0, 0, 0),
(4, 'Oftalmološka ordinacija', 'ordinacija', 1, 0, 0, 3),
(5, 'Kabinet za kontaktna sočiva', 'ordinacijaSociva', 1, 0, 0, 3),
(6, 'Blog', 'blog', 1, 0, 0, 0),
(7, 'Kontakt', 'contact', 1, 0, 0, 0),
(8, 'Administrator', '#', 0, 1, 0, 0),
(9, 'Slajder', 'admin/SliderAdmin', 0, 0, 0, 8),
(10, 'Optika', 'admin/OpticsAdmin', 0, 0, 0, 8),
(11, 'Oprema', 'admin/EquipmentAdmin', 0, 0, 0, 8),
(13, 'Blog', 'admin/BlogAdmin', 0, 0, 0, 8),
(14, 'Podaci o preduzeću', 'admin/CompanyAdmin', 0, 0, 0, 8),
(15, 'Korisnici', 'admin/UsersAdmin', 0, 0, 0, 8),
(16, 'Meni', 'admin/MenuAdmin', 0, 0, 0, 8),
(17, 'Prodavnica', '#', 0, 1, 1, 0),
(18, 'Lista porudžbina', 'sales/OrderList', 0, 0, 0, 17),
(19, 'Poručivanje', 'sales/NewOrder', 0, 0, 0, 17),
(20, 'Lista završenih porudžnina', 'sales/EndOrderList', 0, 0, 0, 17),
(21, 'Kartoteka', 'sales/ArchiveSales', 0, 0, 0, 17),
(22, 'Cenovnik', 'sales/PriceListLensSales', 0, 0, 0, 8),
(23, 'Ostalo', 'sales/OtherSales', 0, 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `name_lenses`
--

CREATE TABLE `name_lenses` (
  `id_name_lens` int(11) NOT NULL,
  `name_name_lens` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `name_lenses`
--

INSERT INTO `name_lenses` (`id_name_lens`, `name_name_lens`) VALUES
(12, 'Bez naziva'),
(17, 'Fotoosetljivo Sensity'),
(18, 'Addpower 60'),
(19, 'Active'),
(20, 'iDentity V+'),
(21, 'iDentity V+ Sensity'),
(22, 'Active TrueForm'),
(23, 'Active TrueForm Sensity'),
(24, 'TrueForm'),
(25, 'TrueForm Sensity'),
(26, 'Lenticular CC 1.50'),
(27, 'Lenticular CX 1.50'),
(29, 'Tact 400 TrueForm'),
(30, 'Tact 200 TrueForm'),
(31, 'Lecture A'),
(32, 'Lecture B'),
(33, 'iD MyStyle V+ 11mm'),
(34, 'iD MyStyle V+ 12mm'),
(35, 'iD MyStyle V+ 13mm'),
(36, 'iD MyStyle V+ 14mm'),
(37, 'iD MyStyle V+ 15mm'),
(38, 'iD MyStyle V+ 16mm'),
(39, 'iD MyStyle V+ 11mm Sensity'),
(40, 'iD MyStyle V+ 12mm Sensity'),
(41, 'iD MyStyle V+ 13mm Sensity'),
(42, 'iD MyStyle V+ 14mm Sensity'),
(43, 'iD MyStyle V+ 15mm Sensity'),
(44, 'iD MyStyle V+ 16mm Sensity'),
(45, 'iD LifeStyle V+ X-Act 11mm'),
(46, 'iD LifeStyle V+ X-Act 14mm'),
(47, 'iD LifeStyle V+ X-Act 11mm Sensity'),
(48, 'iD LifeStyle V+ X-Act 14mm Sensity'),
(49, 'iD LifeStyle V+ 11mm'),
(50, 'iD LifeStyle V+ 14mm'),
(51, 'iD LifeStyle V+ 11mm Sensity'),
(52, 'iD LifeStyle V+ 14mm Sensity'),
(53, 'Summit Pro 11mm'),
(54, 'Summit Pro 14mm'),
(55, 'Summit Pro 11mm Sensity'),
(56, 'Summit Pro 14mm Sensity');

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id_order_list` int(11) NOT NULL,
  `date_order_list` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `note_order_list` text COLLATE utf8_unicode_ci NOT NULL,
  `id_pricelist_lens_right` int(11) NOT NULL,
  `id_pricelist_lens_left` int(11) NOT NULL,
  `id_order_status` int(11) NOT NULL,
  `id_right_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_lists`
--

INSERT INTO `order_lists` (`id_order_list`, `date_order_list`, `id_form`, `note_order_list`, `id_pricelist_lens_right`, `id_pricelist_lens_left`, `id_order_status`, `id_right_left`) VALUES
(1, 1566664640, 1, 'Visina 13mm', 583, 583, 4, 3),
(2, 1568762079, 2, 'Visina 15mm', 918, 918, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int(11) NOT NULL,
  `name_order_status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id_order_status`, `name_order_status`) VALUES
(1, 'Produžen rok čekanja. Javljeno klijentu'),
(2, 'Stigla stakla. Naočare su na ugradnji'),
(3, 'Čekaju se stakla'),
(4, 'Gotove su naočare');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist_lenses`
--

CREATE TABLE `pricelist_lenses` (
  `id_pricelist_lens` int(11) NOT NULL,
  `id_producer_lens` int(11) NOT NULL,
  `id_material_lens` int(11) NOT NULL,
  `id_type_lens` int(11) NOT NULL,
  `id_design_lens` int(11) NOT NULL,
  `id_index_lens` int(11) NOT NULL,
  `id_name_lens` int(11) DEFAULT NULL,
  `id_finishing_lens` int(11) NOT NULL,
  `price_pricelist_lens` decimal(10,2) NOT NULL,
  `id_range_dioptre_lens` int(11) NOT NULL,
  `id_diameter_lens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pricelist_lenses`
--

INSERT INTO `pricelist_lenses` (`id_pricelist_lens`, `id_producer_lens`, `id_material_lens`, `id_type_lens`, `id_design_lens`, `id_index_lens`, `id_name_lens`, `id_finishing_lens`, `price_pricelist_lens`, `id_range_dioptre_lens`, `id_diameter_lens`) VALUES
(47, 1, 1, 1, 1, 1, 12, 2, 49.50, 23, 6),
(48, 1, 1, 1, 1, 1, 12, 2, 49.50, 24, 7),
(49, 1, 1, 1, 1, 1, 12, 8, 39.20, 25, 6),
(50, 1, 1, 1, 1, 1, 12, 8, 39.20, 26, 7),
(51, 1, 1, 1, 1, 1, 12, 8, 49.50, 33, 6),
(52, 1, 1, 1, 1, 1, 12, 8, 49.50, 31, 8),
(53, 1, 1, 1, 1, 1, 12, 8, 49.50, 34, 7),
(54, 1, 1, 1, 1, 1, 12, 8, 49.50, 35, 7),
(55, 1, 1, 1, 1, 1, 12, 3, 39.20, 31, 8),
(56, 1, 1, 1, 1, 1, 12, 3, 39.20, 33, 6),
(57, 1, 1, 1, 1, 1, 12, 3, 39.20, 34, 7),
(58, 1, 1, 1, 1, 1, 12, 3, 39.20, 35, 7),
(59, 1, 1, 1, 1, 1, 12, 10, 18.70, 31, 8),
(60, 1, 1, 1, 1, 1, 12, 10, 18.70, 33, 6),
(61, 1, 1, 1, 1, 1, 12, 10, 18.70, 34, 7),
(62, 1, 1, 1, 1, 1, 12, 10, 18.70, 35, 7),
(63, 1, 1, 1, 1, 1, 12, 3, 28.50, 36, 8),
(64, 1, 1, 1, 1, 1, 12, 3, 28.50, 36, 6),
(65, 1, 1, 1, 1, 1, 12, 3, 28.50, 35, 7),
(66, 1, 1, 1, 1, 1, 12, 8, 39.20, 36, 8),
(67, 1, 1, 1, 1, 1, 12, 8, 39.20, 36, 6),
(68, 1, 1, 1, 1, 1, 12, 8, 39.20, 37, 7),
(69, 1, 1, 1, 1, 1, 12, 2, 45.90, 25, 6),
(70, 1, 1, 1, 1, 1, 12, 2, 45.90, 37, 7),
(71, 1, 1, 1, 1, 1, 17, 3, 75.90, 25, 6),
(72, 1, 1, 1, 1, 1, 17, 3, 75.90, 37, 7),
(73, 1, 1, 1, 1, 12, 17, 3, 133.30, 25, 6),
(74, 1, 1, 1, 1, 12, 17, 3, 133.30, 37, 7),
(75, 1, 1, 1, 5, 1, 18, 3, 61.90, 38, 7),
(76, 1, 1, 1, 5, 1, 18, 8, 72.30, 38, 6),
(77, 1, 1, 1, 5, 1, 18, 8, 72.30, 38, 7),
(78, 1, 1, 1, 5, 1, 18, 3, 61.90, 38, 6),
(79, 1, 1, 1, 5, 1, 18, 10, 44.50, 38, 6),
(80, 1, 1, 1, 5, 1, 18, 10, 44.50, 38, 7),
(81, 1, 1, 1, 1, 13, 12, 8, 55.60, 25, 6),
(82, 1, 1, 1, 1, 13, 12, 8, 55.60, 26, 7),
(83, 1, 1, 1, 1, 13, 12, 3, 45.20, 36, 6),
(84, 1, 1, 1, 1, 13, 12, 3, 45.20, 39, 7),
(85, 1, 1, 1, 1, 13, 12, 8, 55.60, 36, 6),
(86, 1, 1, 1, 1, 13, 12, 8, 55.60, 37, 7),
(87, 1, 1, 1, 5, 1, 19, 3, 56.60, 40, 6),
(88, 1, 1, 1, 5, 1, 19, 3, 56.60, 40, 7),
(89, 1, 1, 1, 5, 1, 19, 3, 56.60, 41, 9),
(90, 1, 1, 1, 5, 14, 12, 8, 128.00, 42, 6),
(91, 1, 1, 1, 5, 14, 12, 8, 128.00, 43, 7),
(92, 1, 1, 1, 5, 14, 12, 8, 128.00, 44, 9),
(93, 1, 1, 1, 5, 15, 12, 8, 86.50, 36, 6),
(94, 1, 1, 1, 5, 15, 12, 8, 86.50, 43, 7),
(95, 1, 1, 1, 5, 15, 12, 8, 86.50, 45, 9),
(96, 1, 1, 1, 5, 15, 12, 3, 76.50, 31, 6),
(97, 1, 1, 1, 5, 15, 12, 3, 76.50, 46, 7),
(98, 1, 1, 1, 5, 15, 12, 3, 76.50, 47, 9),
(99, 1, 1, 1, 5, 12, 12, 8, 67.50, 36, 6),
(100, 1, 1, 1, 5, 12, 12, 8, 67.50, 49, 7),
(101, 1, 1, 1, 5, 12, 12, 8, 67.50, 50, 9),
(102, 1, 1, 1, 5, 12, 12, 3, 57.50, 48, 6),
(103, 1, 1, 1, 5, 12, 12, 3, 57.50, 49, 7),
(104, 1, 1, 1, 5, 12, 12, 3, 57.50, 50, 9),
(105, 1, 1, 1, 1, 15, 12, 8, 86.50, 48, 6),
(106, 1, 1, 1, 1, 15, 12, 8, 86.50, 49, 7),
(107, 1, 1, 1, 1, 15, 12, 8, 86.50, 51, 7),
(108, 1, 1, 1, 1, 15, 12, 8, 86.50, 52, 9),
(109, 1, 1, 1, 1, 15, 12, 3, 76.50, 53, 6),
(110, 1, 1, 1, 1, 15, 12, 3, 76.50, 54, 7),
(111, 1, 1, 1, 1, 15, 12, 3, 76.50, 55, 7),
(112, 1, 1, 1, 1, 15, 12, 3, 76.50, 56, 9),
(113, 1, 1, 1, 1, 12, 12, 2, 78.00, 25, 6),
(114, 1, 1, 1, 1, 12, 12, 2, 78.00, 37, 7),
(115, 1, 1, 1, 1, 12, 12, 8, 67.50, 36, 6),
(116, 1, 1, 1, 1, 12, 12, 8, 67.50, 45, 7),
(117, 1, 1, 1, 1, 12, 12, 3, 57.50, 36, 8),
(118, 1, 1, 1, 1, 12, 12, 3, 57.50, 36, 6),
(119, 1, 1, 1, 1, 12, 12, 3, 57.50, 57, 7),
(120, 1, 1, 2, 5, 1, 20, 2, 104.90, 58, 9),
(121, 1, 1, 2, 5, 1, 20, 2, 104.90, 59, 7),
(122, 1, 1, 2, 5, 1, 20, 2, 104.90, 59, 6),
(123, 1, 1, 2, 5, 1, 20, 8, 98.10, 58, 9),
(124, 1, 1, 2, 5, 1, 20, 8, 98.10, 59, 7),
(125, 1, 1, 2, 5, 1, 20, 8, 98.10, 59, 6),
(126, 1, 1, 2, 5, 1, 21, 2, 143.35, 58, 9),
(127, 1, 1, 2, 5, 1, 21, 2, 143.35, 59, 7),
(128, 1, 1, 2, 5, 1, 21, 2, 143.35, 59, 6),
(129, 1, 1, 2, 5, 1, 21, 8, 136.55, 58, 9),
(130, 1, 1, 2, 5, 1, 21, 8, 136.55, 59, 7),
(131, 1, 1, 2, 5, 1, 21, 8, 136.55, 59, 6),
(132, 1, 1, 2, 5, 12, 20, 2, 137.65, 60, 9),
(133, 1, 1, 2, 5, 12, 20, 2, 137.65, 62, 7),
(134, 1, 1, 2, 5, 12, 20, 2, 137.65, 62, 6),
(135, 1, 1, 2, 5, 12, 21, 2, 176.10, 60, 9),
(136, 1, 1, 2, 5, 12, 21, 2, 176.10, 62, 7),
(137, 1, 1, 2, 5, 12, 21, 2, 176.10, 62, 6),
(138, 1, 1, 2, 5, 12, 20, 8, 131.30, 60, 9),
(139, 1, 1, 2, 5, 12, 20, 8, 131.30, 62, 7),
(140, 1, 1, 2, 5, 12, 20, 8, 131.30, 62, 6),
(141, 1, 1, 2, 5, 12, 21, 8, 169.75, 60, 9),
(142, 1, 1, 2, 5, 12, 21, 8, 169.75, 62, 7),
(143, 1, 1, 2, 5, 12, 21, 8, 169.75, 62, 6),
(144, 1, 1, 2, 5, 15, 20, 2, 159.10, 60, 9),
(145, 1, 1, 2, 5, 15, 20, 2, 159.10, 62, 7),
(146, 1, 1, 2, 5, 15, 20, 2, 159.10, 62, 6),
(147, 1, 1, 2, 5, 15, 21, 2, 197.55, 60, 9),
(148, 1, 1, 2, 5, 15, 21, 2, 197.55, 62, 7),
(149, 1, 1, 2, 5, 15, 21, 2, 197.55, 62, 6),
(150, 1, 1, 2, 5, 15, 20, 8, 159.10, 60, 9),
(151, 1, 1, 2, 5, 15, 20, 8, 159.10, 62, 7),
(152, 1, 1, 2, 5, 15, 20, 8, 159.10, 62, 6),
(153, 1, 1, 2, 5, 15, 21, 8, 197.55, 60, 9),
(154, 1, 1, 2, 5, 15, 21, 8, 197.55, 62, 7),
(155, 1, 1, 2, 5, 15, 21, 8, 197.55, 62, 6),
(156, 1, 1, 2, 5, 14, 20, 2, 232.10, 58, 9),
(157, 1, 1, 2, 5, 14, 20, 2, 232.10, 63, 7),
(158, 1, 1, 2, 5, 14, 20, 2, 232.10, 64, 7),
(159, 1, 1, 2, 5, 14, 20, 2, 232.10, 63, 6),
(160, 1, 1, 2, 5, 14, 20, 2, 232.10, 64, 6),
(161, 1, 1, 2, 5, 14, 20, 8, 225.70, 58, 9),
(162, 1, 1, 2, 5, 14, 20, 8, 225.70, 63, 7),
(163, 1, 1, 2, 5, 14, 20, 8, 225.70, 64, 7),
(164, 1, 1, 2, 5, 14, 20, 8, 225.70, 63, 6),
(165, 1, 1, 2, 5, 14, 20, 8, 225.70, 64, 6),
(166, 1, 1, 2, 5, 1, 22, 2, 102.60, 65, 9),
(167, 1, 1, 2, 5, 1, 22, 8, 96.00, 65, 9),
(168, 1, 1, 2, 5, 1, 22, 3, 86.20, 65, 9),
(169, 1, 1, 2, 5, 1, 23, 2, 141.05, 65, 9),
(170, 1, 1, 2, 5, 1, 23, 8, 134.45, 65, 9),
(171, 1, 1, 2, 5, 1, 23, 3, 124.65, 65, 9),
(172, 1, 1, 2, 5, 12, 22, 2, 138.30, 65, 9),
(173, 1, 1, 2, 5, 12, 23, 2, 176.75, 65, 9),
(174, 1, 1, 2, 5, 12, 22, 8, 132.00, 65, 9),
(175, 1, 1, 2, 5, 12, 23, 8, 170.45, 65, 9),
(176, 1, 1, 2, 5, 12, 22, 3, 122.50, 65, 9),
(177, 1, 1, 2, 5, 12, 23, 3, 160.95, 65, 9),
(178, 1, 1, 2, 5, 15, 22, 2, 148.40, 65, 9),
(179, 1, 1, 2, 5, 15, 23, 2, 186.85, 65, 9),
(180, 1, 1, 2, 5, 15, 22, 8, 142.10, 65, 9),
(181, 1, 1, 2, 5, 15, 23, 8, 180.55, 65, 9),
(182, 1, 1, 2, 5, 15, 22, 3, 132.60, 65, 9),
(183, 1, 1, 2, 5, 15, 23, 3, 171.05, 65, 9),
(184, 1, 1, 2, 5, 15, 22, 2, 148.40, 66, 7),
(185, 1, 1, 2, 5, 15, 22, 8, 142.10, 66, 7),
(186, 1, 1, 2, 5, 15, 22, 3, 132.60, 66, 7),
(187, 1, 1, 2, 5, 15, 23, 3, 171.05, 66, 7),
(188, 1, 1, 2, 5, 15, 23, 8, 180.55, 66, 7),
(189, 1, 1, 2, 5, 15, 23, 2, 186.85, 66, 7),
(190, 1, 1, 2, 5, 1, 24, 2, 95.35, 67, 9),
(191, 1, 1, 2, 5, 1, 24, 2, 95.35, 68, 7),
(192, 1, 1, 2, 5, 1, 24, 2, 95.35, 69, 6),
(193, 1, 1, 2, 5, 1, 24, 8, 89.10, 67, 9),
(194, 1, 1, 2, 5, 1, 24, 8, 89.10, 68, 7),
(195, 1, 1, 2, 5, 1, 24, 8, 89.10, 69, 6),
(196, 1, 1, 2, 5, 1, 24, 3, 79.60, 67, 9),
(197, 1, 1, 2, 5, 1, 24, 3, 79.60, 68, 7),
(198, 1, 1, 2, 5, 1, 24, 3, 79.60, 69, 6),
(199, 1, 1, 2, 5, 1, 25, 2, 133.80, 67, 9),
(200, 1, 1, 2, 5, 1, 25, 2, 133.80, 68, 7),
(201, 1, 1, 2, 5, 1, 25, 2, 133.80, 69, 6),
(202, 1, 1, 2, 5, 1, 25, 8, 127.55, 67, 9),
(203, 1, 1, 2, 5, 1, 25, 8, 127.55, 68, 7),
(204, 1, 1, 2, 5, 1, 25, 8, 127.55, 69, 6),
(205, 1, 1, 2, 5, 1, 25, 3, 118.05, 67, 9),
(206, 1, 1, 2, 5, 1, 25, 3, 118.05, 68, 7),
(207, 1, 1, 2, 5, 1, 25, 3, 118.05, 69, 6),
(208, 1, 1, 2, 5, 13, 24, 2, 113.30, 70, 9),
(209, 1, 1, 2, 5, 13, 24, 2, 113.30, 65, 7),
(210, 1, 1, 2, 5, 13, 24, 2, 113.30, 71, 6),
(211, 1, 1, 2, 5, 13, 24, 8, 107.10, 70, 9),
(212, 1, 1, 2, 5, 13, 24, 8, 107.10, 65, 7),
(213, 1, 1, 2, 5, 13, 24, 8, 107.10, 71, 6),
(214, 1, 1, 2, 5, 13, 24, 3, 97.55, 70, 9),
(215, 1, 1, 2, 5, 13, 24, 3, 97.55, 65, 7),
(216, 1, 1, 2, 5, 13, 24, 3, 97.55, 71, 6),
(217, 1, 1, 2, 5, 13, 25, 2, 151.75, 70, 9),
(218, 1, 1, 2, 5, 13, 25, 2, 151.75, 65, 7),
(219, 1, 1, 2, 5, 13, 25, 2, 151.75, 71, 6),
(220, 1, 1, 2, 5, 13, 25, 8, 145.55, 70, 9),
(221, 1, 1, 2, 5, 13, 25, 8, 145.55, 65, 7),
(222, 1, 1, 2, 5, 13, 25, 8, 145.55, 71, 6),
(223, 1, 1, 2, 5, 13, 25, 3, 136.00, 70, 9),
(224, 1, 1, 2, 5, 13, 25, 3, 136.00, 65, 7),
(225, 1, 1, 2, 5, 13, 25, 3, 136.00, 71, 6),
(226, 1, 1, 2, 5, 12, 24, 2, 130.10, 73, 9),
(227, 1, 1, 2, 5, 12, 24, 2, 130.10, 72, 10),
(228, 1, 1, 2, 5, 12, 24, 2, 130.10, 71, 7),
(229, 1, 1, 2, 5, 12, 24, 2, 130.10, 71, 6),
(230, 1, 1, 2, 5, 12, 24, 8, 123.75, 72, 10),
(231, 1, 1, 2, 5, 12, 24, 8, 123.75, 73, 9),
(232, 1, 1, 2, 5, 12, 24, 8, 123.75, 71, 7),
(233, 1, 1, 2, 5, 12, 24, 8, 123.75, 71, 6),
(234, 1, 1, 2, 5, 12, 24, 3, 114.90, 72, 10),
(235, 1, 1, 2, 5, 12, 24, 3, 114.90, 73, 9),
(236, 1, 1, 2, 5, 12, 24, 3, 114.90, 71, 7),
(237, 1, 1, 2, 5, 12, 24, 3, 114.90, 71, 6),
(238, 1, 1, 2, 5, 12, 25, 2, 168.55, 72, 10),
(239, 1, 1, 2, 5, 12, 25, 2, 168.55, 73, 9),
(240, 1, 1, 2, 5, 12, 25, 2, 168.55, 71, 7),
(241, 1, 1, 2, 5, 12, 25, 2, 168.55, 71, 6),
(242, 1, 1, 2, 5, 12, 25, 8, 162.20, 72, 10),
(243, 1, 1, 2, 5, 12, 25, 8, 162.20, 73, 9),
(244, 1, 1, 2, 5, 12, 25, 8, 162.20, 71, 7),
(245, 1, 1, 2, 5, 12, 25, 8, 162.20, 71, 6),
(246, 1, 1, 2, 5, 12, 25, 3, 153.35, 72, 10),
(247, 1, 1, 2, 5, 12, 25, 3, 153.35, 73, 9),
(248, 1, 1, 2, 5, 12, 25, 3, 153.35, 71, 7),
(249, 1, 1, 2, 5, 12, 25, 3, 153.35, 71, 6),
(250, 1, 1, 2, 5, 15, 24, 2, 148.10, 74, 10),
(251, 1, 1, 2, 5, 15, 24, 2, 148.10, 75, 9),
(252, 1, 1, 2, 5, 15, 24, 2, 148.10, 65, 7),
(253, 1, 1, 2, 5, 15, 24, 2, 148.10, 76, 6),
(254, 1, 1, 2, 5, 15, 24, 8, 141.75, 74, 10),
(255, 1, 1, 2, 5, 15, 24, 8, 141.75, 75, 9),
(256, 1, 1, 2, 5, 15, 24, 8, 141.75, 65, 7),
(257, 1, 1, 2, 5, 15, 24, 8, 141.75, 76, 6),
(258, 1, 1, 2, 5, 15, 24, 3, 132.30, 74, 10),
(259, 1, 1, 2, 5, 15, 24, 3, 132.30, 75, 9),
(260, 1, 1, 2, 5, 15, 24, 3, 132.30, 65, 7),
(261, 1, 1, 2, 5, 15, 24, 3, 132.30, 76, 6),
(262, 1, 1, 2, 5, 15, 25, 2, 186.55, 74, 10),
(263, 1, 1, 2, 5, 15, 25, 2, 186.55, 75, 9),
(264, 1, 1, 2, 5, 15, 25, 2, 186.55, 65, 7),
(265, 1, 1, 2, 5, 15, 25, 2, 186.55, 76, 6),
(266, 1, 1, 2, 5, 15, 25, 8, 180.20, 74, 10),
(267, 1, 1, 2, 5, 15, 25, 8, 180.20, 75, 9),
(268, 1, 1, 2, 5, 15, 25, 8, 180.20, 65, 7),
(269, 1, 1, 2, 5, 15, 25, 8, 180.20, 76, 6),
(270, 1, 1, 2, 5, 15, 25, 3, 170.84, 74, 10),
(271, 1, 1, 2, 5, 15, 25, 3, 170.84, 75, 9),
(272, 1, 1, 2, 5, 15, 25, 3, 170.84, 65, 7),
(273, 1, 1, 2, 5, 15, 25, 3, 170.84, 76, 6),
(274, 1, 1, 2, 5, 14, 24, 2, 188.50, 77, 10),
(275, 1, 1, 2, 5, 14, 24, 2, 188.50, 78, 9),
(276, 1, 1, 2, 5, 14, 24, 2, 188.50, 79, 7),
(277, 1, 1, 2, 5, 14, 24, 2, 188.50, 80, 6),
(278, 1, 1, 2, 5, 14, 24, 8, 182.20, 77, 10),
(279, 1, 1, 2, 5, 14, 24, 8, 182.20, 78, 9),
(280, 1, 1, 2, 5, 14, 24, 8, 182.20, 79, 7),
(281, 1, 1, 2, 5, 14, 24, 8, 182.20, 80, 6),
(282, 1, 1, 2, 1, 1, 24, 2, 95.35, 81, 9),
(283, 1, 1, 2, 1, 1, 24, 2, 95.35, 82, 7),
(284, 1, 1, 2, 1, 1, 24, 2, 95.35, 83, 6),
(285, 1, 1, 2, 1, 1, 24, 2, 95.35, 84, 6),
(286, 1, 1, 2, 1, 1, 24, 2, 95.35, 83, 8),
(287, 1, 1, 2, 1, 1, 24, 2, 95.35, 84, 8),
(288, 1, 1, 2, 1, 1, 24, 8, 89.10, 81, 9),
(289, 1, 1, 2, 1, 1, 24, 8, 89.10, 82, 7),
(290, 1, 1, 2, 1, 1, 24, 8, 89.10, 83, 6),
(291, 1, 1, 2, 1, 1, 24, 8, 89.10, 84, 6),
(292, 1, 1, 2, 1, 1, 24, 8, 89.10, 83, 8),
(293, 1, 1, 2, 1, 1, 24, 8, 89.10, 84, 8),
(294, 1, 1, 2, 1, 1, 24, 3, 79.60, 81, 9),
(295, 1, 1, 2, 1, 1, 24, 3, 79.60, 82, 7),
(296, 1, 1, 2, 1, 1, 24, 3, 79.60, 83, 6),
(297, 1, 1, 2, 1, 1, 24, 3, 79.60, 84, 6),
(298, 1, 1, 2, 1, 1, 24, 3, 79.60, 83, 8),
(299, 1, 1, 2, 1, 1, 24, 3, 79.60, 84, 8),
(300, 1, 1, 2, 1, 1, 25, 2, 133.83, 81, 9),
(301, 1, 1, 2, 1, 1, 25, 2, 133.83, 82, 7),
(302, 1, 1, 2, 1, 1, 25, 2, 133.83, 83, 6),
(303, 1, 1, 2, 1, 1, 25, 2, 133.83, 84, 6),
(304, 1, 1, 2, 1, 1, 25, 2, 133.83, 83, 8),
(305, 1, 1, 2, 1, 1, 25, 2, 133.83, 84, 8),
(306, 1, 1, 2, 1, 1, 25, 8, 127.55, 81, 9),
(307, 1, 1, 2, 1, 1, 25, 8, 127.55, 82, 7),
(308, 1, 1, 2, 1, 1, 25, 8, 127.55, 83, 6),
(309, 1, 1, 2, 1, 1, 25, 8, 127.55, 84, 6),
(310, 1, 1, 2, 1, 1, 25, 8, 127.55, 83, 8),
(311, 1, 1, 2, 1, 1, 25, 8, 127.55, 84, 8),
(312, 1, 1, 2, 1, 1, 25, 3, 118.05, 81, 9),
(313, 1, 1, 2, 1, 1, 25, 3, 118.05, 82, 7),
(314, 1, 1, 2, 1, 1, 25, 3, 118.05, 83, 6),
(315, 1, 1, 2, 1, 1, 25, 3, 118.05, 84, 6),
(316, 1, 1, 2, 1, 1, 25, 3, 118.05, 83, 8),
(317, 1, 1, 2, 1, 1, 25, 3, 118.05, 84, 8),
(318, 1, 1, 2, 1, 13, 24, 2, 113.30, 85, 9),
(319, 1, 1, 2, 1, 13, 24, 2, 113.30, 69, 7),
(320, 1, 1, 2, 1, 13, 24, 2, 113.30, 86, 6),
(321, 1, 1, 2, 1, 13, 24, 8, 107.10, 85, 9),
(322, 1, 1, 2, 1, 13, 24, 8, 107.10, 69, 7),
(323, 1, 1, 2, 1, 13, 24, 8, 107.10, 86, 6),
(324, 1, 1, 2, 1, 13, 24, 3, 97.55, 85, 9),
(325, 1, 1, 2, 1, 13, 24, 3, 97.55, 69, 7),
(326, 1, 1, 2, 1, 13, 24, 3, 97.55, 86, 6),
(327, 1, 1, 2, 1, 13, 25, 2, 151.78, 85, 9),
(328, 1, 1, 2, 1, 13, 25, 2, 151.78, 69, 7),
(329, 1, 1, 2, 1, 13, 25, 2, 151.78, 86, 6),
(330, 1, 1, 2, 1, 13, 25, 8, 145.55, 85, 9),
(331, 1, 1, 2, 1, 13, 25, 8, 145.55, 69, 7),
(332, 1, 1, 2, 1, 13, 25, 8, 145.55, 86, 6),
(333, 1, 1, 2, 1, 13, 25, 3, 136.00, 85, 9),
(334, 1, 1, 2, 1, 13, 25, 3, 136.00, 69, 7),
(335, 1, 1, 2, 1, 13, 25, 3, 136.00, 86, 6),
(336, 1, 1, 2, 1, 12, 24, 2, 130.10, 81, 9),
(337, 1, 1, 2, 1, 12, 24, 2, 130.10, 65, 7),
(338, 1, 1, 2, 1, 12, 24, 2, 130.10, 87, 6),
(339, 1, 1, 2, 1, 12, 24, 8, 123.75, 81, 9),
(340, 1, 1, 2, 1, 12, 24, 8, 123.75, 65, 7),
(341, 1, 1, 2, 1, 12, 24, 8, 123.75, 87, 6),
(342, 1, 1, 2, 1, 12, 24, 3, 114.90, 81, 9),
(343, 1, 1, 2, 1, 12, 24, 3, 114.90, 65, 7),
(344, 1, 1, 2, 1, 12, 24, 3, 114.90, 87, 6),
(345, 1, 1, 2, 1, 12, 25, 2, 168.55, 81, 9),
(346, 1, 1, 2, 1, 12, 25, 2, 168.55, 65, 7),
(347, 1, 1, 2, 1, 12, 25, 2, 168.55, 87, 6),
(348, 1, 1, 2, 1, 12, 25, 8, 162.20, 81, 9),
(349, 1, 1, 2, 1, 12, 25, 8, 162.20, 65, 7),
(350, 1, 1, 2, 1, 12, 25, 8, 162.20, 87, 6),
(351, 1, 1, 2, 1, 12, 25, 3, 153.35, 81, 9),
(352, 1, 1, 2, 1, 12, 25, 3, 153.35, 65, 7),
(353, 1, 1, 2, 1, 12, 25, 3, 153.35, 87, 6),
(354, 1, 1, 2, 1, 15, 24, 2, 148.10, 85, 9),
(355, 1, 1, 2, 1, 15, 24, 2, 148.10, 88, 7),
(356, 1, 1, 2, 1, 15, 24, 2, 148.10, 89, 6),
(357, 1, 1, 2, 1, 15, 24, 8, 141.75, 85, 9),
(358, 1, 1, 2, 1, 15, 24, 8, 141.75, 88, 7),
(359, 1, 1, 2, 1, 15, 24, 8, 141.75, 89, 6),
(360, 1, 1, 2, 1, 15, 24, 3, 132.30, 85, 9),
(361, 1, 1, 2, 1, 15, 24, 3, 132.30, 88, 7),
(362, 1, 1, 2, 1, 15, 24, 3, 132.30, 89, 6),
(363, 1, 1, 2, 1, 15, 25, 2, 186.55, 85, 9),
(364, 1, 1, 2, 1, 15, 25, 2, 186.55, 88, 7),
(365, 1, 1, 2, 1, 15, 25, 2, 186.55, 89, 6),
(366, 1, 1, 2, 1, 15, 25, 8, 180.20, 85, 9),
(367, 1, 1, 2, 1, 15, 25, 8, 180.20, 88, 7),
(368, 1, 1, 2, 1, 15, 25, 8, 180.20, 89, 6),
(369, 1, 1, 2, 1, 15, 25, 3, 170.75, 85, 9),
(370, 1, 1, 2, 1, 15, 25, 3, 170.75, 88, 7),
(371, 1, 1, 2, 1, 15, 25, 3, 170.75, 89, 6),
(372, 1, 1, 2, 1, 1, 27, 2, 165.10, 90, 6),
(373, 1, 1, 2, 1, 1, 27, 8, 158.80, 90, 6),
(374, 1, 1, 2, 1, 1, 27, 3, 149.35, 90, 6),
(375, 1, 1, 2, 1, 1, 26, 2, 165.10, 91, 6),
(376, 1, 1, 2, 1, 1, 26, 8, 158.80, 91, 6),
(377, 1, 1, 2, 1, 1, 26, 3, 149.35, 91, 6),
(378, 1, 1, 3, 5, 1, 30, 2, 120.30, 93, 9),
(379, 1, 1, 3, 5, 1, 30, 2, 120.30, 95, 7),
(380, 1, 1, 3, 5, 1, 30, 8, 114.00, 93, 9),
(381, 1, 1, 3, 5, 1, 30, 8, 114.00, 95, 7),
(382, 1, 1, 3, 5, 1, 30, 3, 104.50, 93, 9),
(384, 1, 1, 3, 5, 1, 30, 3, 104.50, 95, 7),
(385, 1, 1, 3, 5, 1, 29, 2, 120.30, 93, 9),
(386, 1, 1, 3, 5, 1, 29, 2, 120.30, 95, 7),
(387, 1, 1, 3, 5, 1, 29, 8, 114.00, 93, 9),
(388, 1, 1, 3, 5, 1, 29, 8, 114.00, 95, 7),
(389, 1, 1, 3, 5, 1, 29, 3, 104.50, 93, 9),
(390, 1, 1, 3, 5, 1, 29, 3, 104.50, 95, 7),
(391, 1, 1, 3, 5, 12, 30, 2, 140.20, 94, 10),
(392, 1, 1, 3, 5, 12, 30, 2, 140.20, 95, 9),
(393, 1, 1, 3, 5, 12, 30, 8, 133.90, 94, 10),
(394, 1, 1, 3, 5, 12, 30, 8, 133.90, 95, 9),
(395, 1, 1, 3, 5, 12, 30, 3, 124.40, 94, 10),
(396, 1, 1, 3, 5, 12, 30, 3, 124.40, 95, 9),
(397, 1, 1, 3, 5, 12, 29, 2, 140.20, 94, 10),
(398, 1, 1, 3, 5, 12, 29, 2, 140.20, 95, 9),
(399, 1, 1, 3, 5, 12, 29, 8, 133.90, 94, 10),
(400, 1, 1, 3, 5, 12, 29, 8, 133.90, 95, 9),
(401, 1, 1, 3, 5, 12, 29, 3, 124.40, 94, 10),
(402, 1, 1, 3, 5, 12, 29, 3, 124.40, 95, 9),
(403, 1, 1, 3, 5, 1, 18, 2, 96.90, 74, 9),
(404, 1, 1, 3, 5, 1, 18, 2, 96.90, 96, 7),
(405, 1, 1, 3, 5, 1, 18, 8, 90.60, 74, 9),
(406, 1, 1, 3, 5, 1, 18, 8, 90.60, 96, 7),
(407, 1, 1, 3, 5, 1, 18, 3, 81.20, 74, 9),
(408, 1, 1, 3, 5, 1, 18, 3, 81.20, 96, 7),
(409, 1, 1, 3, 5, 1, 31, 2, 96.90, 74, 9),
(410, 1, 1, 3, 5, 1, 31, 2, 96.90, 96, 7),
(411, 1, 1, 3, 5, 1, 31, 8, 90.60, 74, 9),
(412, 1, 1, 3, 5, 1, 31, 8, 90.60, 96, 7),
(413, 1, 1, 3, 5, 1, 31, 3, 81.20, 74, 9),
(414, 1, 1, 3, 5, 1, 31, 3, 81.20, 96, 7),
(415, 1, 1, 3, 5, 1, 32, 2, 96.90, 74, 9),
(416, 1, 1, 3, 5, 1, 32, 2, 96.90, 96, 7),
(417, 1, 1, 3, 5, 1, 32, 8, 90.60, 74, 9),
(418, 1, 1, 3, 5, 1, 32, 8, 90.60, 96, 7),
(419, 1, 1, 3, 5, 1, 32, 3, 81.20, 74, 9),
(420, 1, 1, 3, 5, 1, 32, 3, 81.20, 96, 7),
(421, 1, 1, 3, 5, 12, 31, 2, 115.30, 97, 10),
(422, 1, 1, 3, 5, 12, 31, 2, 115.30, 97, 9),
(423, 1, 1, 3, 5, 12, 31, 2, 115.30, 98, 7),
(424, 1, 1, 3, 5, 12, 31, 8, 108.90, 97, 10),
(425, 1, 1, 3, 5, 12, 31, 8, 108.90, 97, 9),
(426, 1, 1, 3, 5, 12, 31, 8, 108.90, 98, 7),
(427, 1, 1, 3, 5, 12, 31, 3, 99.50, 97, 10),
(428, 1, 1, 3, 5, 12, 31, 3, 99.50, 97, 9),
(429, 1, 1, 3, 5, 12, 31, 3, 99.50, 98, 7),
(430, 1, 1, 3, 5, 12, 32, 2, 115.30, 97, 10),
(431, 1, 1, 3, 5, 12, 32, 2, 115.30, 97, 9),
(432, 1, 1, 3, 5, 12, 32, 2, 115.30, 98, 7),
(433, 1, 1, 3, 5, 12, 32, 8, 108.90, 97, 10),
(434, 1, 1, 3, 5, 12, 32, 8, 108.90, 97, 9),
(435, 1, 1, 3, 5, 12, 32, 8, 108.90, 98, 7),
(436, 1, 1, 3, 5, 12, 32, 3, 99.50, 97, 10),
(437, 1, 1, 3, 5, 12, 32, 3, 99.50, 97, 9),
(438, 1, 1, 3, 5, 12, 32, 3, 99.50, 98, 7),
(439, 1, 1, 4, 5, 1, 33, 2, 281.60, 99, 9),
(440, 1, 1, 4, 5, 1, 33, 2, 281.60, 100, 7),
(441, 1, 1, 4, 5, 1, 33, 2, 281.60, 101, 6),
(442, 1, 1, 4, 5, 1, 33, 8, 275.30, 99, 9),
(443, 1, 1, 4, 5, 1, 33, 8, 275.30, 100, 7),
(444, 1, 1, 4, 5, 1, 33, 8, 275.30, 101, 6),
(445, 1, 1, 4, 5, 1, 39, 2, 320.05, 99, 9),
(446, 1, 1, 4, 5, 1, 39, 2, 320.05, 100, 7),
(447, 1, 1, 4, 5, 1, 39, 2, 320.05, 101, 6),
(448, 1, 1, 4, 5, 1, 39, 8, 313.75, 99, 9),
(449, 1, 1, 4, 5, 1, 39, 8, 313.75, 100, 7),
(450, 1, 1, 4, 5, 1, 39, 8, 313.75, 101, 6),
(451, 1, 1, 4, 5, 1, 34, 2, 281.60, 99, 9),
(452, 1, 1, 4, 5, 1, 34, 2, 281.60, 100, 7),
(453, 1, 1, 4, 5, 1, 34, 2, 281.60, 101, 6),
(454, 1, 1, 4, 5, 1, 34, 8, 275.30, 99, 9),
(455, 1, 1, 4, 5, 1, 34, 8, 275.30, 100, 7),
(456, 1, 1, 4, 5, 1, 34, 8, 275.30, 101, 6),
(457, 1, 1, 4, 5, 1, 40, 2, 320.05, 99, 9),
(458, 1, 1, 4, 5, 1, 40, 2, 320.05, 100, 7),
(459, 1, 1, 4, 5, 1, 40, 2, 320.05, 101, 6),
(460, 1, 1, 4, 5, 1, 40, 8, 313.75, 99, 9),
(461, 1, 1, 4, 5, 1, 40, 8, 313.75, 100, 7),
(462, 1, 1, 4, 5, 1, 40, 8, 313.75, 101, 6),
(463, 1, 1, 4, 5, 1, 35, 2, 281.60, 99, 9),
(464, 1, 1, 4, 5, 1, 35, 2, 281.60, 100, 7),
(465, 1, 1, 4, 5, 1, 35, 2, 281.60, 101, 6),
(466, 1, 1, 4, 5, 1, 35, 8, 275.30, 99, 9),
(467, 1, 1, 4, 5, 1, 35, 8, 275.30, 100, 7),
(468, 1, 1, 4, 5, 1, 35, 8, 275.30, 101, 6),
(469, 1, 1, 4, 5, 1, 41, 2, 320.05, 99, 9),
(470, 1, 1, 4, 5, 1, 41, 2, 320.05, 100, 7),
(471, 1, 1, 4, 5, 1, 41, 2, 320.05, 101, 6),
(472, 1, 1, 4, 5, 1, 41, 8, 313.75, 99, 9),
(473, 1, 1, 4, 5, 1, 41, 8, 313.75, 100, 7),
(474, 1, 1, 4, 5, 1, 41, 8, 313.75, 101, 6),
(475, 1, 1, 4, 5, 1, 36, 2, 281.60, 99, 9),
(476, 1, 1, 4, 5, 1, 36, 2, 281.60, 100, 7),
(477, 1, 1, 4, 5, 1, 36, 2, 281.60, 101, 6),
(478, 1, 1, 4, 5, 1, 36, 8, 275.30, 99, 9),
(479, 1, 1, 4, 5, 1, 36, 8, 275.30, 100, 7),
(480, 1, 1, 4, 5, 1, 36, 8, 275.30, 101, 6),
(481, 1, 1, 4, 5, 1, 42, 2, 320.05, 99, 9),
(482, 1, 1, 4, 5, 1, 42, 2, 320.05, 100, 7),
(483, 1, 1, 4, 5, 1, 42, 2, 320.05, 101, 6),
(484, 1, 1, 4, 5, 1, 42, 8, 313.75, 99, 9),
(485, 1, 1, 4, 5, 1, 42, 8, 313.75, 100, 7),
(486, 1, 1, 4, 5, 1, 42, 8, 313.75, 101, 6),
(487, 1, 1, 4, 5, 1, 37, 2, 281.60, 99, 9),
(488, 1, 1, 4, 5, 1, 37, 2, 281.60, 100, 7),
(489, 1, 1, 4, 5, 1, 37, 2, 281.60, 101, 6),
(490, 1, 1, 4, 5, 1, 37, 8, 275.30, 99, 9),
(491, 1, 1, 4, 5, 1, 37, 8, 275.30, 100, 7),
(492, 1, 1, 4, 5, 1, 37, 8, 275.30, 101, 6),
(493, 1, 1, 4, 5, 1, 43, 2, 320.05, 99, 9),
(494, 1, 1, 4, 5, 1, 43, 2, 320.05, 100, 7),
(495, 1, 1, 4, 5, 1, 43, 2, 320.05, 101, 6),
(496, 1, 1, 4, 5, 1, 43, 8, 313.75, 99, 9),
(497, 1, 1, 4, 5, 1, 43, 8, 313.75, 100, 7),
(498, 1, 1, 4, 5, 1, 43, 8, 313.75, 101, 6),
(499, 1, 1, 4, 5, 1, 38, 2, 281.60, 99, 9),
(500, 1, 1, 4, 5, 1, 38, 2, 281.60, 100, 7),
(501, 1, 1, 4, 5, 1, 38, 2, 281.60, 101, 6),
(502, 1, 1, 4, 5, 1, 38, 8, 275.30, 99, 9),
(503, 1, 1, 4, 5, 1, 38, 8, 275.30, 100, 7),
(504, 1, 1, 4, 5, 1, 38, 8, 275.30, 101, 6),
(505, 1, 1, 4, 5, 1, 44, 2, 320.05, 99, 9),
(506, 1, 1, 4, 5, 1, 44, 2, 320.05, 100, 7),
(507, 1, 1, 4, 5, 1, 44, 2, 320.05, 101, 6),
(508, 1, 1, 4, 5, 1, 44, 8, 313.75, 99, 9),
(509, 1, 1, 4, 5, 1, 44, 8, 313.75, 100, 7),
(510, 1, 1, 4, 5, 1, 44, 8, 313.75, 101, 6),
(511, 1, 1, 4, 5, 13, 33, 2, 327.40, 102, 9),
(512, 1, 1, 4, 5, 13, 33, 2, 327.40, 103, 7),
(513, 1, 1, 4, 5, 13, 33, 2, 327.40, 101, 6),
(514, 1, 1, 4, 5, 13, 33, 8, 321.10, 102, 9),
(515, 1, 1, 4, 5, 13, 33, 8, 321.10, 103, 7),
(516, 1, 1, 4, 5, 13, 33, 8, 321.10, 101, 6),
(517, 1, 1, 4, 5, 13, 39, 2, 365.85, 102, 9),
(518, 1, 1, 4, 5, 13, 39, 2, 365.85, 103, 7),
(519, 1, 1, 4, 5, 13, 39, 2, 365.85, 101, 6),
(520, 1, 1, 4, 5, 13, 39, 8, 359.55, 102, 9),
(521, 1, 1, 4, 5, 13, 39, 8, 359.55, 103, 7),
(522, 1, 1, 4, 5, 13, 39, 8, 359.55, 101, 6),
(523, 1, 1, 4, 5, 13, 34, 2, 327.40, 102, 9),
(524, 1, 1, 4, 5, 13, 34, 2, 327.40, 103, 7),
(525, 1, 1, 4, 5, 13, 34, 2, 327.40, 101, 6),
(526, 1, 1, 4, 5, 13, 34, 8, 321.10, 102, 9),
(527, 1, 1, 4, 5, 13, 34, 8, 321.10, 103, 7),
(528, 1, 1, 4, 5, 13, 34, 8, 321.10, 101, 6),
(529, 1, 1, 4, 5, 13, 40, 2, 365.85, 102, 9),
(530, 1, 1, 4, 5, 13, 40, 2, 365.85, 103, 7),
(531, 1, 1, 4, 5, 13, 40, 2, 365.85, 101, 6),
(532, 1, 1, 4, 5, 13, 40, 8, 359.55, 102, 9),
(533, 1, 1, 4, 5, 13, 40, 8, 359.55, 103, 7),
(534, 1, 1, 4, 5, 13, 40, 8, 359.55, 101, 6),
(535, 1, 1, 4, 5, 13, 35, 2, 327.40, 102, 9),
(536, 1, 1, 4, 5, 13, 35, 2, 327.40, 103, 7),
(537, 1, 1, 4, 5, 13, 35, 2, 327.40, 101, 6),
(538, 1, 1, 4, 5, 13, 35, 8, 321.10, 102, 9),
(539, 1, 1, 4, 5, 13, 35, 8, 321.10, 103, 7),
(540, 1, 1, 4, 5, 13, 35, 8, 321.10, 101, 6),
(541, 1, 1, 4, 5, 13, 41, 2, 365.85, 102, 9),
(542, 1, 1, 4, 5, 13, 41, 2, 365.85, 103, 7),
(543, 1, 1, 4, 5, 13, 41, 2, 365.85, 101, 6),
(544, 1, 1, 4, 5, 13, 41, 8, 359.55, 102, 9),
(545, 1, 1, 4, 5, 13, 41, 8, 359.55, 103, 7),
(546, 1, 1, 4, 5, 13, 41, 8, 359.55, 101, 6),
(547, 1, 1, 4, 5, 13, 36, 2, 327.40, 102, 9),
(548, 1, 1, 4, 5, 13, 36, 2, 327.40, 103, 7),
(549, 1, 1, 4, 5, 13, 36, 2, 327.40, 101, 6),
(550, 1, 1, 4, 5, 13, 36, 8, 321.10, 102, 9),
(551, 1, 1, 4, 5, 13, 36, 8, 321.10, 103, 7),
(552, 1, 1, 4, 5, 13, 36, 8, 321.10, 101, 6),
(553, 1, 1, 4, 5, 13, 42, 2, 365.85, 102, 9),
(554, 1, 1, 4, 5, 13, 42, 2, 365.85, 103, 7),
(555, 1, 1, 4, 5, 13, 42, 2, 365.85, 101, 6),
(556, 1, 1, 4, 5, 13, 42, 8, 359.55, 102, 9),
(557, 1, 1, 4, 5, 13, 42, 8, 359.55, 103, 7),
(558, 1, 1, 4, 5, 13, 42, 8, 359.55, 101, 6),
(559, 1, 1, 4, 5, 13, 37, 2, 327.40, 102, 9),
(560, 1, 1, 4, 5, 13, 37, 2, 327.40, 103, 7),
(561, 1, 1, 4, 5, 13, 37, 2, 327.40, 101, 6),
(562, 1, 1, 4, 5, 13, 37, 8, 321.10, 102, 9),
(563, 1, 1, 4, 5, 13, 37, 8, 321.10, 103, 7),
(564, 1, 1, 4, 5, 13, 37, 8, 321.10, 101, 6),
(565, 1, 1, 4, 5, 13, 43, 2, 365.85, 102, 9),
(566, 1, 1, 4, 5, 13, 43, 2, 365.85, 103, 7),
(567, 1, 1, 4, 5, 13, 43, 2, 365.85, 101, 6),
(568, 1, 1, 4, 5, 13, 43, 8, 359.55, 102, 9),
(569, 1, 1, 4, 5, 13, 43, 8, 359.55, 103, 7),
(570, 1, 1, 4, 5, 13, 43, 8, 359.55, 101, 6),
(571, 1, 1, 4, 5, 13, 38, 2, 327.40, 102, 9),
(572, 1, 1, 4, 5, 13, 38, 2, 327.40, 103, 7),
(573, 1, 1, 4, 5, 13, 38, 2, 327.40, 101, 6),
(574, 1, 1, 4, 5, 13, 38, 8, 321.10, 102, 9),
(575, 1, 1, 4, 5, 13, 38, 8, 321.10, 103, 7),
(576, 1, 1, 4, 5, 13, 38, 8, 321.10, 101, 6),
(577, 1, 1, 4, 5, 13, 44, 2, 365.85, 102, 9),
(578, 1, 1, 4, 5, 13, 44, 2, 365.85, 103, 7),
(579, 1, 1, 4, 5, 13, 44, 2, 365.85, 101, 6),
(580, 1, 1, 4, 5, 13, 44, 8, 359.55, 102, 9),
(581, 1, 1, 4, 5, 13, 44, 8, 359.55, 103, 7),
(582, 1, 1, 4, 5, 13, 44, 8, 359.55, 101, 6),
(583, 1, 1, 4, 5, 12, 33, 2, 336.80, 104, 9),
(584, 1, 1, 4, 5, 12, 33, 2, 336.80, 105, 7),
(585, 1, 1, 4, 5, 12, 33, 2, 336.80, 106, 7),
(586, 1, 1, 4, 5, 12, 33, 2, 336.80, 107, 6),
(587, 1, 1, 4, 5, 12, 33, 8, 330.60, 104, 9),
(588, 1, 1, 4, 5, 12, 33, 8, 330.60, 105, 7),
(589, 1, 1, 4, 5, 12, 33, 8, 330.60, 106, 7),
(590, 1, 1, 4, 5, 12, 33, 8, 330.60, 107, 6),
(591, 1, 1, 4, 5, 12, 39, 2, 375.25, 104, 9),
(592, 1, 1, 4, 5, 12, 39, 2, 375.25, 105, 7),
(593, 1, 1, 4, 5, 12, 39, 2, 375.25, 106, 7),
(594, 1, 1, 4, 5, 12, 39, 2, 375.25, 107, 6),
(595, 1, 1, 4, 5, 12, 39, 8, 369.05, 104, 9),
(596, 1, 1, 4, 5, 12, 39, 8, 369.05, 105, 7),
(597, 1, 1, 4, 5, 12, 39, 8, 369.05, 106, 7),
(598, 1, 1, 4, 5, 12, 39, 8, 369.05, 107, 6),
(599, 1, 1, 4, 5, 12, 34, 2, 336.80, 104, 9),
(600, 1, 1, 4, 5, 12, 34, 2, 336.80, 105, 7),
(601, 1, 1, 4, 5, 12, 34, 2, 336.80, 106, 7),
(602, 1, 1, 4, 5, 12, 34, 2, 336.80, 107, 6),
(603, 1, 1, 4, 5, 12, 34, 8, 330.60, 104, 9),
(604, 1, 1, 4, 5, 12, 34, 8, 330.60, 105, 7),
(605, 1, 1, 4, 5, 12, 34, 8, 330.60, 106, 7),
(606, 1, 1, 4, 5, 12, 34, 8, 330.60, 107, 6),
(607, 1, 1, 4, 5, 12, 40, 2, 375.25, 104, 9),
(608, 1, 1, 4, 5, 12, 40, 2, 375.25, 105, 7),
(609, 1, 1, 4, 5, 12, 40, 2, 375.25, 106, 7),
(610, 1, 1, 4, 5, 12, 40, 2, 375.25, 107, 6),
(611, 1, 1, 4, 5, 12, 40, 8, 369.05, 104, 9),
(612, 1, 1, 4, 5, 12, 40, 8, 369.05, 105, 7),
(613, 1, 1, 4, 5, 12, 40, 8, 369.05, 106, 7),
(614, 1, 1, 4, 5, 12, 40, 8, 369.05, 107, 6),
(615, 1, 1, 4, 5, 12, 35, 2, 336.80, 94, 10),
(616, 1, 1, 4, 5, 12, 35, 2, 336.80, 104, 9),
(617, 1, 1, 4, 5, 12, 35, 2, 336.80, 108, 9),
(618, 1, 1, 4, 5, 12, 35, 2, 336.80, 105, 7),
(619, 1, 1, 4, 5, 12, 35, 2, 336.80, 106, 7),
(620, 1, 1, 4, 5, 12, 35, 2, 336.80, 107, 6),
(621, 1, 1, 4, 5, 12, 35, 8, 330.60, 94, 10),
(622, 1, 1, 4, 5, 12, 35, 8, 330.60, 104, 9),
(623, 1, 1, 4, 5, 12, 35, 8, 330.60, 108, 9),
(624, 1, 1, 4, 5, 12, 35, 8, 330.60, 105, 7),
(625, 1, 1, 4, 5, 12, 35, 8, 330.60, 106, 7),
(626, 1, 1, 4, 5, 12, 35, 8, 330.60, 107, 6),
(627, 1, 1, 4, 5, 12, 41, 2, 375.25, 94, 10),
(628, 1, 1, 4, 5, 12, 41, 2, 375.25, 104, 9),
(629, 1, 1, 4, 5, 12, 41, 2, 375.25, 108, 9),
(630, 1, 1, 4, 5, 12, 41, 2, 375.25, 105, 7),
(631, 1, 1, 4, 5, 12, 41, 2, 375.25, 106, 7),
(632, 1, 1, 4, 5, 12, 41, 2, 375.25, 107, 6),
(633, 1, 1, 4, 5, 12, 41, 8, 369.05, 94, 10),
(634, 1, 1, 4, 5, 12, 41, 8, 369.05, 104, 9),
(635, 1, 1, 4, 5, 12, 41, 8, 369.05, 108, 9),
(636, 1, 1, 4, 5, 12, 41, 8, 369.05, 105, 7),
(637, 1, 1, 4, 5, 12, 41, 8, 369.05, 106, 7),
(638, 1, 1, 4, 5, 12, 41, 8, 369.05, 107, 6),
(639, 1, 1, 4, 5, 12, 36, 2, 336.80, 94, 10),
(640, 1, 1, 4, 5, 12, 36, 2, 336.80, 104, 9),
(641, 1, 1, 4, 5, 12, 36, 2, 336.80, 108, 9),
(642, 1, 1, 4, 5, 12, 36, 2, 336.80, 105, 7),
(643, 1, 1, 4, 5, 12, 36, 2, 336.80, 106, 7),
(644, 1, 1, 4, 5, 12, 36, 2, 336.80, 107, 6),
(645, 1, 1, 4, 5, 12, 36, 8, 330.60, 94, 10),
(646, 1, 1, 4, 5, 12, 36, 8, 330.60, 104, 9),
(647, 1, 1, 4, 5, 12, 36, 8, 330.60, 108, 9),
(648, 1, 1, 4, 5, 12, 36, 8, 330.60, 105, 7),
(649, 1, 1, 4, 5, 12, 36, 8, 330.60, 106, 7),
(650, 1, 1, 4, 5, 12, 36, 8, 330.60, 107, 6),
(651, 1, 1, 4, 5, 12, 42, 2, 375.25, 94, 10),
(652, 1, 1, 4, 5, 12, 42, 2, 375.25, 104, 9),
(653, 1, 1, 4, 5, 12, 42, 2, 375.25, 108, 9),
(654, 1, 1, 4, 5, 12, 42, 2, 375.25, 105, 7),
(655, 1, 1, 4, 5, 12, 42, 2, 375.25, 106, 7),
(656, 1, 1, 4, 5, 12, 42, 2, 375.25, 107, 6),
(657, 1, 1, 4, 5, 12, 42, 8, 369.05, 94, 10),
(658, 1, 1, 4, 5, 12, 42, 8, 369.05, 104, 9),
(659, 1, 1, 4, 5, 12, 42, 8, 369.05, 108, 9),
(660, 1, 1, 4, 5, 12, 42, 8, 369.05, 105, 7),
(661, 1, 1, 4, 5, 12, 42, 8, 369.05, 106, 7),
(662, 1, 1, 4, 5, 12, 42, 8, 369.05, 107, 6),
(663, 1, 1, 4, 5, 12, 37, 2, 336.80, 94, 10),
(664, 1, 1, 4, 5, 12, 37, 2, 336.80, 104, 9),
(665, 1, 1, 4, 5, 12, 37, 2, 336.80, 108, 9),
(666, 1, 1, 4, 5, 12, 37, 2, 336.80, 105, 7),
(667, 1, 1, 4, 5, 12, 37, 2, 336.80, 106, 7),
(668, 1, 1, 4, 5, 12, 37, 2, 336.80, 107, 6),
(669, 1, 1, 4, 5, 12, 37, 8, 330.60, 94, 10),
(670, 1, 1, 4, 5, 12, 37, 8, 330.60, 104, 9),
(671, 1, 1, 4, 5, 12, 37, 8, 330.60, 108, 9),
(672, 1, 1, 4, 5, 12, 37, 8, 330.60, 105, 7),
(673, 1, 1, 4, 5, 12, 37, 8, 330.60, 106, 7),
(674, 1, 1, 4, 5, 12, 37, 8, 330.60, 107, 6),
(675, 1, 1, 4, 5, 12, 43, 2, 375.25, 94, 10),
(676, 1, 1, 4, 5, 12, 43, 2, 375.25, 104, 9),
(677, 1, 1, 4, 5, 12, 43, 2, 375.25, 108, 9),
(678, 1, 1, 4, 5, 12, 43, 2, 375.25, 105, 7),
(679, 1, 1, 4, 5, 12, 43, 2, 375.25, 106, 7),
(680, 1, 1, 4, 5, 12, 43, 2, 375.25, 107, 6),
(681, 1, 1, 4, 5, 12, 43, 8, 369.05, 94, 10),
(682, 1, 1, 4, 5, 12, 43, 8, 369.05, 104, 9),
(683, 1, 1, 4, 5, 12, 43, 8, 369.05, 108, 9),
(684, 1, 1, 4, 5, 12, 43, 8, 369.05, 105, 7),
(685, 1, 1, 4, 5, 12, 43, 8, 369.05, 106, 7),
(686, 1, 1, 4, 5, 12, 43, 8, 369.05, 107, 6),
(687, 1, 1, 4, 5, 12, 38, 2, 336.80, 94, 10),
(688, 1, 1, 4, 5, 12, 38, 2, 336.80, 104, 9),
(689, 1, 1, 4, 5, 12, 38, 2, 336.80, 108, 9),
(690, 1, 1, 4, 5, 12, 38, 2, 336.80, 105, 7),
(691, 1, 1, 4, 5, 12, 38, 2, 336.80, 106, 7),
(692, 1, 1, 4, 5, 12, 38, 2, 336.80, 107, 6),
(693, 1, 1, 4, 5, 12, 38, 8, 330.60, 94, 10),
(694, 1, 1, 4, 5, 12, 38, 8, 330.60, 104, 9),
(695, 1, 1, 4, 5, 12, 38, 8, 330.60, 108, 9),
(696, 1, 1, 4, 5, 12, 38, 8, 330.60, 105, 7),
(697, 1, 1, 4, 5, 12, 38, 8, 330.60, 106, 7),
(698, 1, 1, 4, 5, 12, 38, 8, 330.60, 107, 6),
(699, 1, 1, 4, 5, 12, 44, 2, 375.25, 94, 10),
(700, 1, 1, 4, 5, 12, 44, 2, 375.25, 104, 9),
(701, 1, 1, 4, 5, 12, 44, 2, 375.25, 108, 9),
(702, 1, 1, 4, 5, 12, 44, 2, 375.25, 105, 7),
(703, 1, 1, 4, 5, 12, 44, 2, 375.25, 106, 7),
(704, 1, 1, 4, 5, 12, 44, 2, 375.25, 107, 6),
(705, 1, 1, 4, 5, 12, 44, 8, 369.05, 94, 10),
(706, 1, 1, 4, 5, 12, 44, 8, 369.05, 104, 9),
(707, 1, 1, 4, 5, 12, 44, 8, 369.05, 108, 9),
(708, 1, 1, 4, 5, 12, 44, 8, 369.05, 105, 7),
(709, 1, 1, 4, 5, 12, 44, 8, 369.05, 106, 7),
(710, 1, 1, 4, 5, 12, 44, 8, 369.05, 107, 6),
(711, 1, 1, 4, 5, 15, 33, 2, 387.40, 109, 9),
(712, 1, 1, 4, 5, 15, 33, 2, 387.40, 107, 7),
(713, 1, 1, 4, 5, 15, 33, 8, 381.10, 109, 9),
(714, 1, 1, 4, 5, 15, 33, 8, 381.10, 107, 7),
(715, 1, 1, 4, 5, 15, 39, 2, 425.85, 109, 9),
(716, 1, 1, 4, 5, 15, 39, 2, 425.85, 107, 7),
(717, 1, 1, 4, 5, 15, 39, 8, 419.55, 109, 9),
(718, 1, 1, 4, 5, 15, 39, 8, 419.55, 107, 7),
(719, 1, 1, 4, 5, 15, 34, 2, 387.40, 109, 9),
(720, 1, 1, 4, 5, 15, 34, 2, 387.40, 107, 7),
(721, 1, 1, 4, 5, 15, 34, 8, 381.10, 109, 9),
(722, 1, 1, 4, 5, 15, 34, 8, 381.10, 107, 7),
(723, 1, 1, 4, 5, 15, 40, 2, 425.85, 109, 9),
(724, 1, 1, 4, 5, 15, 40, 2, 425.85, 107, 7),
(725, 1, 1, 4, 5, 15, 40, 8, 419.55, 109, 9),
(726, 1, 1, 4, 5, 15, 40, 8, 419.55, 107, 7),
(727, 1, 1, 4, 5, 15, 35, 2, 387.40, 109, 9),
(728, 1, 1, 4, 5, 15, 35, 2, 387.40, 107, 7),
(729, 1, 1, 4, 5, 15, 35, 8, 381.10, 109, 9),
(730, 1, 1, 4, 5, 15, 35, 8, 381.10, 107, 7),
(731, 1, 1, 4, 5, 15, 41, 2, 425.85, 109, 9),
(732, 1, 1, 4, 5, 15, 41, 2, 425.85, 107, 7),
(733, 1, 1, 4, 5, 15, 41, 8, 419.55, 109, 9),
(734, 1, 1, 4, 5, 15, 41, 8, 419.55, 107, 7),
(735, 1, 1, 4, 5, 15, 36, 2, 387.40, 109, 9),
(736, 1, 1, 4, 5, 15, 36, 2, 387.40, 107, 7),
(737, 1, 1, 4, 5, 15, 36, 8, 381.10, 109, 9),
(738, 1, 1, 4, 5, 15, 36, 8, 381.10, 107, 7),
(739, 1, 1, 4, 5, 15, 42, 2, 425.85, 109, 9),
(740, 1, 1, 4, 5, 15, 42, 2, 425.85, 107, 7),
(741, 1, 1, 4, 5, 15, 42, 8, 419.55, 109, 9),
(742, 1, 1, 4, 5, 15, 42, 8, 419.55, 107, 7),
(743, 1, 1, 4, 5, 15, 37, 2, 387.40, 109, 9),
(744, 1, 1, 4, 5, 15, 37, 2, 387.40, 107, 7),
(745, 1, 1, 4, 5, 15, 37, 8, 381.10, 109, 9),
(746, 1, 1, 4, 5, 15, 37, 8, 381.10, 107, 7),
(747, 1, 1, 4, 5, 15, 43, 2, 425.85, 109, 9),
(748, 1, 1, 4, 5, 15, 43, 2, 425.85, 107, 7),
(749, 1, 1, 4, 5, 15, 43, 8, 419.55, 109, 9),
(750, 1, 1, 4, 5, 15, 43, 8, 419.55, 107, 7),
(751, 1, 1, 4, 5, 15, 38, 2, 387.40, 109, 9),
(752, 1, 1, 4, 5, 15, 38, 2, 387.40, 107, 7),
(753, 1, 1, 4, 5, 15, 38, 8, 381.10, 109, 9),
(754, 1, 1, 4, 5, 15, 38, 8, 381.10, 107, 7),
(755, 1, 1, 4, 5, 15, 44, 2, 425.85, 109, 9),
(756, 1, 1, 4, 5, 15, 44, 2, 425.85, 107, 7),
(757, 1, 1, 4, 5, 15, 44, 8, 419.55, 109, 9),
(758, 1, 1, 4, 5, 15, 44, 8, 419.55, 107, 7),
(759, 1, 1, 4, 5, 15, 35, 2, 387.40, 94, 10),
(760, 1, 1, 4, 5, 15, 35, 2, 387.40, 108, 9),
(761, 1, 1, 4, 5, 15, 35, 8, 381.10, 94, 10),
(762, 1, 1, 4, 5, 15, 35, 8, 381.10, 108, 9),
(763, 1, 1, 4, 5, 15, 41, 2, 425.85, 94, 10),
(764, 1, 1, 4, 5, 15, 41, 2, 425.85, 108, 9),
(765, 1, 1, 4, 5, 15, 41, 8, 419.55, 94, 10),
(766, 1, 1, 4, 5, 15, 41, 8, 419.55, 108, 9),
(767, 1, 1, 4, 5, 15, 36, 2, 387.40, 94, 10),
(768, 1, 1, 4, 5, 15, 36, 2, 387.40, 108, 9),
(769, 1, 1, 4, 5, 15, 36, 8, 381.10, 94, 10),
(770, 1, 1, 4, 5, 15, 36, 8, 381.10, 108, 9),
(771, 1, 1, 4, 5, 15, 42, 2, 425.85, 94, 10),
(772, 1, 1, 4, 5, 15, 42, 2, 425.85, 108, 9),
(773, 1, 1, 4, 5, 15, 42, 8, 419.55, 94, 10),
(774, 1, 1, 4, 5, 15, 42, 8, 419.55, 108, 9),
(775, 1, 1, 4, 5, 15, 37, 2, 387.40, 94, 10),
(776, 1, 1, 4, 5, 15, 37, 2, 387.40, 108, 9),
(777, 1, 1, 4, 5, 15, 37, 8, 381.10, 94, 10),
(778, 1, 1, 4, 5, 15, 37, 8, 381.10, 108, 9),
(779, 1, 1, 4, 5, 15, 43, 2, 425.85, 94, 10),
(780, 1, 1, 4, 5, 15, 43, 2, 425.85, 108, 9),
(781, 1, 1, 4, 5, 15, 43, 8, 419.55, 94, 10),
(782, 1, 1, 4, 5, 15, 43, 8, 419.55, 108, 9),
(783, 1, 1, 4, 5, 15, 38, 2, 387.40, 94, 10),
(784, 1, 1, 4, 5, 15, 38, 2, 387.40, 108, 9),
(785, 1, 1, 4, 5, 15, 38, 8, 381.10, 94, 10),
(786, 1, 1, 4, 5, 15, 38, 8, 381.10, 108, 9),
(787, 1, 1, 4, 5, 15, 44, 2, 425.85, 94, 10),
(788, 1, 1, 4, 5, 15, 44, 2, 425.85, 108, 9),
(789, 1, 1, 4, 5, 15, 44, 8, 419.55, 94, 10),
(790, 1, 1, 4, 5, 15, 44, 8, 419.55, 108, 9),
(791, 1, 1, 4, 5, 14, 33, 2, 476.40, 109, 9),
(792, 1, 1, 4, 5, 14, 33, 2, 476.40, 110, 7),
(793, 1, 1, 4, 5, 14, 33, 2, 476.40, 111, 6),
(794, 1, 1, 4, 5, 14, 33, 8, 470.00, 109, 9),
(795, 1, 1, 4, 5, 14, 33, 8, 470.00, 110, 7),
(796, 1, 1, 4, 5, 14, 33, 8, 470.00, 111, 6),
(797, 1, 1, 4, 5, 14, 34, 2, 476.40, 109, 9),
(798, 1, 1, 4, 5, 14, 34, 2, 476.40, 110, 7),
(799, 1, 1, 4, 5, 14, 34, 2, 476.40, 111, 6),
(800, 1, 1, 4, 5, 14, 34, 8, 470.00, 109, 9),
(801, 1, 1, 4, 5, 14, 34, 8, 470.00, 110, 7),
(802, 1, 1, 4, 5, 14, 34, 8, 470.00, 111, 6),
(803, 1, 1, 4, 5, 14, 35, 2, 476.40, 109, 9),
(804, 1, 1, 4, 5, 14, 35, 2, 476.40, 110, 7),
(805, 1, 1, 4, 5, 14, 35, 2, 476.40, 111, 6),
(806, 1, 1, 4, 5, 14, 35, 8, 470.00, 109, 9),
(807, 1, 1, 4, 5, 14, 35, 8, 470.00, 110, 7),
(808, 1, 1, 4, 5, 14, 35, 8, 470.00, 111, 6),
(809, 1, 1, 4, 5, 14, 36, 2, 476.40, 109, 9),
(810, 1, 1, 4, 5, 14, 36, 2, 476.40, 110, 7),
(811, 1, 1, 4, 5, 14, 36, 2, 476.40, 111, 6),
(812, 1, 1, 4, 5, 14, 36, 8, 470.00, 109, 9),
(813, 1, 1, 4, 5, 14, 36, 8, 470.00, 110, 7),
(814, 1, 1, 4, 5, 14, 36, 8, 470.00, 111, 6),
(815, 1, 1, 4, 5, 14, 37, 2, 476.40, 109, 9),
(816, 1, 1, 4, 5, 14, 37, 2, 476.40, 110, 7),
(817, 1, 1, 4, 5, 14, 37, 2, 476.40, 111, 6),
(818, 1, 1, 4, 5, 14, 37, 8, 470.00, 109, 9),
(819, 1, 1, 4, 5, 14, 37, 8, 470.00, 110, 7),
(820, 1, 1, 4, 5, 14, 37, 8, 470.00, 111, 6),
(821, 1, 1, 4, 5, 14, 38, 2, 476.40, 109, 9),
(822, 1, 1, 4, 5, 14, 38, 2, 476.40, 110, 7),
(823, 1, 1, 4, 5, 14, 38, 2, 476.40, 111, 6),
(824, 1, 1, 4, 5, 14, 38, 8, 470.00, 109, 9),
(825, 1, 1, 4, 5, 14, 38, 8, 470.00, 110, 7),
(826, 1, 1, 4, 5, 14, 38, 8, 470.00, 111, 6),
(827, 1, 1, 4, 5, 14, 35, 2, 476.40, 94, 10),
(828, 1, 1, 4, 5, 14, 35, 2, 476.40, 108, 9),
(829, 1, 1, 4, 5, 14, 35, 8, 470.00, 94, 10),
(830, 1, 1, 4, 5, 14, 35, 8, 470.00, 108, 9),
(831, 1, 1, 4, 5, 14, 36, 2, 476.40, 94, 10),
(832, 1, 1, 4, 5, 14, 36, 2, 476.40, 108, 9),
(833, 1, 1, 4, 5, 14, 36, 8, 470.00, 94, 10),
(834, 1, 1, 4, 5, 14, 36, 8, 470.00, 108, 9),
(835, 1, 1, 4, 5, 14, 37, 2, 476.40, 94, 10),
(836, 1, 1, 4, 5, 14, 37, 2, 476.40, 108, 9),
(837, 1, 1, 4, 5, 14, 37, 8, 470.00, 94, 10),
(838, 1, 1, 4, 5, 14, 37, 8, 470.00, 108, 9),
(839, 1, 1, 4, 5, 14, 38, 2, 476.40, 94, 10),
(840, 1, 1, 4, 5, 14, 38, 2, 476.40, 108, 9),
(841, 1, 1, 4, 5, 14, 38, 8, 470.00, 94, 10),
(842, 1, 1, 4, 5, 14, 38, 8, 470.00, 108, 9),
(843, 1, 1, 4, 5, 1, 45, 2, 245.90, 95, 9),
(844, 1, 1, 4, 5, 1, 45, 2, 245.90, 101, 7),
(845, 1, 1, 4, 5, 1, 45, 2, 245.90, 101, 6),
(846, 1, 1, 4, 5, 1, 45, 8, 239.60, 95, 9),
(847, 1, 1, 4, 5, 1, 45, 8, 239.60, 101, 7),
(848, 1, 1, 4, 5, 1, 45, 8, 239.60, 101, 6),
(849, 1, 1, 4, 5, 1, 47, 2, 284.35, 95, 9),
(850, 1, 1, 4, 5, 1, 47, 2, 284.35, 101, 7),
(851, 1, 1, 4, 5, 1, 47, 2, 284.35, 101, 6),
(852, 1, 1, 4, 5, 1, 47, 8, 278.05, 95, 9),
(853, 1, 1, 4, 5, 1, 47, 8, 278.05, 101, 7),
(854, 1, 1, 4, 5, 1, 47, 8, 278.05, 101, 6),
(855, 1, 1, 4, 5, 1, 46, 2, 245.90, 95, 9),
(856, 1, 1, 4, 5, 1, 46, 2, 245.90, 101, 7),
(857, 1, 1, 4, 5, 1, 46, 2, 245.90, 101, 6),
(858, 1, 1, 4, 5, 1, 46, 8, 239.60, 95, 9),
(859, 1, 1, 4, 5, 1, 46, 8, 239.60, 101, 7),
(860, 1, 1, 4, 5, 1, 46, 8, 239.60, 101, 6),
(861, 1, 1, 4, 5, 1, 48, 2, 284.35, 95, 9),
(862, 1, 1, 4, 5, 1, 48, 2, 284.35, 101, 7),
(863, 1, 1, 4, 5, 1, 48, 2, 284.35, 101, 6),
(864, 1, 1, 4, 5, 1, 48, 8, 278.05, 95, 9),
(865, 1, 1, 4, 5, 1, 48, 8, 278.05, 101, 7),
(866, 1, 1, 4, 5, 1, 48, 8, 278.05, 101, 6),
(867, 1, 1, 4, 5, 13, 45, 2, 285.70, 95, 9),
(868, 1, 1, 4, 5, 13, 45, 2, 285.70, 101, 7),
(869, 1, 1, 4, 5, 13, 45, 2, 285.70, 101, 6),
(870, 1, 1, 4, 5, 13, 45, 8, 279.40, 95, 9),
(871, 1, 1, 4, 5, 13, 45, 8, 279.40, 101, 7),
(872, 1, 1, 4, 5, 13, 45, 8, 279.40, 101, 6),
(873, 1, 1, 4, 5, 13, 47, 2, 324.15, 95, 9),
(874, 1, 1, 4, 5, 13, 47, 2, 324.15, 101, 7),
(875, 1, 1, 4, 5, 13, 47, 2, 324.15, 101, 6),
(876, 1, 1, 4, 5, 13, 47, 8, 317.85, 95, 9),
(877, 1, 1, 4, 5, 13, 47, 8, 317.85, 101, 7),
(878, 1, 1, 4, 5, 13, 47, 8, 317.85, 101, 6),
(879, 1, 1, 4, 5, 13, 46, 2, 285.70, 95, 9),
(880, 1, 1, 4, 5, 13, 46, 2, 285.70, 101, 7),
(881, 1, 1, 4, 5, 13, 46, 2, 285.70, 101, 6),
(882, 1, 1, 4, 5, 13, 46, 8, 279.40, 95, 9),
(883, 1, 1, 4, 5, 13, 46, 8, 279.40, 101, 7),
(884, 1, 1, 4, 5, 13, 46, 8, 279.40, 101, 6),
(885, 1, 1, 4, 5, 13, 48, 2, 324.15, 95, 9),
(886, 1, 1, 4, 5, 13, 48, 2, 324.15, 101, 7),
(887, 1, 1, 4, 5, 13, 48, 2, 324.15, 101, 6),
(888, 1, 1, 4, 5, 13, 48, 8, 317.85, 95, 9),
(889, 1, 1, 4, 5, 13, 48, 8, 317.85, 101, 7),
(890, 1, 1, 4, 5, 13, 48, 8, 317.85, 101, 6),
(891, 1, 1, 4, 5, 12, 45, 2, 293.90, 95, 9),
(892, 1, 1, 4, 5, 12, 45, 2, 293.90, 112, 7),
(893, 1, 1, 4, 5, 12, 45, 2, 293.90, 106, 7),
(894, 1, 1, 4, 5, 12, 45, 2, 293.90, 113, 6),
(895, 1, 1, 4, 5, 12, 45, 8, 287.60, 95, 9),
(896, 1, 1, 4, 5, 12, 45, 8, 287.60, 112, 7),
(897, 1, 1, 4, 5, 12, 45, 8, 287.60, 106, 7),
(898, 1, 1, 4, 5, 12, 45, 8, 287.60, 113, 6),
(899, 1, 1, 4, 5, 12, 47, 2, 332.35, 95, 9),
(900, 1, 1, 4, 5, 12, 47, 2, 332.35, 112, 7),
(901, 1, 1, 4, 5, 12, 47, 2, 332.35, 106, 7),
(902, 1, 1, 4, 5, 12, 47, 2, 332.35, 113, 6),
(903, 1, 1, 4, 5, 12, 47, 8, 326.05, 95, 9),
(904, 1, 1, 4, 5, 12, 47, 8, 326.05, 112, 7),
(905, 1, 1, 4, 5, 12, 47, 8, 326.05, 106, 7),
(906, 1, 1, 4, 5, 12, 47, 8, 326.05, 113, 6),
(907, 1, 1, 4, 5, 12, 46, 2, 293.90, 95, 9),
(908, 1, 1, 4, 5, 12, 46, 2, 293.90, 112, 7),
(909, 1, 1, 4, 5, 12, 46, 2, 293.90, 106, 7),
(910, 1, 1, 4, 5, 12, 46, 2, 293.90, 113, 6),
(911, 1, 1, 4, 5, 12, 46, 8, 287.60, 95, 9),
(912, 1, 1, 4, 5, 12, 46, 8, 287.60, 112, 7),
(913, 1, 1, 4, 5, 12, 46, 8, 287.60, 106, 7),
(914, 1, 1, 4, 5, 12, 46, 8, 287.60, 113, 6),
(915, 1, 1, 4, 5, 12, 48, 2, 332.35, 95, 9),
(916, 1, 1, 4, 5, 12, 48, 2, 332.35, 112, 7),
(917, 1, 1, 4, 5, 12, 48, 2, 332.35, 106, 7),
(918, 1, 1, 4, 5, 12, 48, 2, 332.35, 113, 6),
(919, 1, 1, 4, 5, 12, 48, 8, 326.05, 95, 9),
(920, 1, 1, 4, 5, 12, 48, 8, 326.05, 112, 7),
(921, 1, 1, 4, 5, 12, 48, 8, 326.05, 106, 7),
(922, 1, 1, 4, 5, 12, 48, 8, 326.05, 113, 6),
(923, 1, 1, 4, 5, 12, 46, 2, 293.90, 94, 10),
(924, 1, 1, 4, 5, 12, 46, 8, 287.60, 94, 10),
(925, 1, 1, 4, 5, 12, 48, 2, 332.35, 94, 10),
(926, 1, 1, 4, 5, 12, 48, 8, 326.05, 94, 10),
(927, 1, 1, 4, 5, 15, 45, 2, 337.80, 109, 9),
(928, 1, 1, 4, 5, 15, 45, 2, 337.80, 114, 7),
(929, 1, 1, 4, 5, 15, 45, 2, 337.80, 114, 6),
(930, 1, 1, 4, 5, 15, 45, 8, 331.50, 109, 9),
(931, 1, 1, 4, 5, 15, 45, 8, 331.50, 114, 7),
(932, 1, 1, 4, 5, 15, 45, 8, 331.50, 114, 6),
(933, 1, 1, 4, 5, 15, 47, 2, 376.25, 109, 9),
(934, 1, 1, 4, 5, 15, 47, 2, 376.25, 114, 7),
(935, 1, 1, 4, 5, 15, 47, 2, 376.25, 114, 6),
(936, 1, 1, 4, 5, 15, 47, 8, 369.95, 109, 9),
(937, 1, 1, 4, 5, 15, 47, 8, 369.95, 114, 7),
(938, 1, 1, 4, 5, 15, 47, 8, 369.95, 114, 6),
(939, 1, 1, 4, 5, 15, 46, 2, 337.80, 109, 9),
(940, 1, 1, 4, 5, 15, 46, 2, 337.80, 114, 7),
(941, 1, 1, 4, 5, 15, 46, 2, 337.80, 114, 6),
(942, 1, 1, 4, 5, 15, 46, 8, 331.50, 109, 9),
(943, 1, 1, 4, 5, 15, 46, 8, 331.50, 114, 7),
(944, 1, 1, 4, 5, 15, 46, 8, 331.50, 114, 6),
(945, 1, 1, 4, 5, 15, 48, 2, 376.25, 109, 9),
(946, 1, 1, 4, 5, 15, 48, 2, 376.25, 114, 7),
(947, 1, 1, 4, 5, 15, 48, 2, 376.25, 114, 6),
(948, 1, 1, 4, 5, 15, 48, 8, 369.95, 109, 9),
(949, 1, 1, 4, 5, 15, 48, 8, 369.95, 114, 7),
(950, 1, 1, 4, 5, 15, 48, 8, 369.95, 114, 6),
(951, 1, 1, 4, 5, 15, 46, 2, 337.80, 94, 10),
(952, 1, 1, 4, 5, 15, 46, 8, 331.50, 94, 10),
(953, 1, 1, 4, 5, 15, 48, 2, 376.25, 94, 10),
(954, 1, 1, 4, 5, 15, 48, 8, 369.95, 94, 10),
(955, 1, 1, 4, 5, 14, 45, 2, 415.20, 109, 9),
(956, 1, 1, 4, 5, 14, 45, 2, 415.20, 110, 7),
(957, 1, 1, 4, 5, 14, 45, 2, 415.20, 110, 6),
(958, 1, 1, 4, 5, 14, 45, 8, 408.90, 109, 9),
(959, 1, 1, 4, 5, 14, 45, 8, 408.90, 110, 7),
(960, 1, 1, 4, 5, 14, 45, 8, 408.90, 110, 6),
(961, 1, 1, 4, 5, 14, 46, 2, 415.20, 109, 9),
(962, 1, 1, 4, 5, 14, 46, 2, 415.20, 110, 7),
(963, 1, 1, 4, 5, 14, 46, 2, 415.20, 110, 6),
(964, 1, 1, 4, 5, 14, 46, 8, 408.90, 109, 9),
(965, 1, 1, 4, 5, 14, 46, 8, 408.90, 110, 7),
(966, 1, 1, 4, 5, 14, 46, 8, 408.90, 110, 6),
(967, 1, 1, 4, 5, 14, 46, 2, 415.20, 94, 10),
(968, 1, 1, 4, 5, 14, 46, 8, 408.90, 94, 10),
(969, 1, 1, 4, 5, 1, 49, 2, 215.90, 95, 9),
(970, 1, 1, 4, 5, 1, 49, 2, 215.90, 95, 7),
(971, 1, 1, 4, 5, 1, 49, 2, 215.90, 101, 6),
(972, 1, 1, 4, 5, 1, 49, 8, 209.70, 95, 9),
(973, 1, 1, 4, 5, 1, 49, 8, 209.70, 95, 7),
(974, 1, 1, 4, 5, 1, 49, 8, 209.70, 101, 6),
(975, 1, 1, 4, 5, 1, 49, 3, 200.20, 95, 9),
(976, 1, 1, 4, 5, 1, 49, 3, 200.20, 95, 7),
(977, 1, 1, 4, 5, 1, 49, 3, 200.20, 101, 6),
(978, 1, 1, 4, 5, 1, 51, 2, 254.35, 95, 9),
(979, 1, 1, 4, 5, 1, 51, 2, 254.35, 95, 7),
(980, 1, 1, 4, 5, 1, 51, 2, 254.35, 101, 6),
(981, 1, 1, 4, 5, 1, 51, 8, 248.15, 95, 9),
(982, 1, 1, 4, 5, 1, 51, 8, 248.15, 95, 7),
(983, 1, 1, 4, 5, 1, 51, 8, 248.15, 101, 6),
(984, 1, 1, 4, 5, 1, 51, 3, 238.65, 95, 9),
(985, 1, 1, 4, 5, 1, 51, 3, 238.65, 95, 7),
(986, 1, 1, 4, 5, 1, 51, 3, 238.65, 101, 6),
(987, 1, 1, 4, 5, 1, 50, 2, 215.90, 95, 9),
(988, 1, 1, 4, 5, 1, 50, 2, 215.90, 95, 7),
(989, 1, 1, 4, 5, 1, 50, 2, 215.90, 101, 6),
(990, 1, 1, 4, 5, 1, 50, 8, 209.70, 95, 9),
(991, 1, 1, 4, 5, 1, 50, 8, 209.70, 95, 7),
(992, 1, 1, 4, 5, 1, 50, 8, 209.70, 101, 6),
(993, 1, 1, 4, 5, 1, 50, 3, 200.20, 95, 9),
(994, 1, 1, 4, 5, 1, 50, 3, 200.20, 95, 7),
(995, 1, 1, 4, 5, 1, 50, 3, 200.20, 101, 6),
(996, 1, 1, 4, 5, 1, 52, 2, 254.35, 95, 9),
(997, 1, 1, 4, 5, 1, 52, 2, 254.35, 95, 7),
(998, 1, 1, 4, 5, 1, 52, 2, 254.35, 101, 6),
(999, 1, 1, 4, 5, 1, 52, 8, 248.15, 95, 9),
(1000, 1, 1, 4, 5, 1, 52, 8, 248.15, 95, 7),
(1001, 1, 1, 4, 5, 1, 52, 8, 248.15, 101, 6),
(1002, 1, 1, 4, 5, 1, 52, 3, 238.65, 95, 9),
(1003, 1, 1, 4, 5, 1, 52, 3, 238.65, 95, 7),
(1004, 1, 1, 4, 5, 1, 52, 3, 238.65, 101, 6),
(1005, 1, 1, 4, 5, 13, 49, 2, 250.70, 95, 9),
(1006, 1, 1, 4, 5, 13, 49, 2, 250.70, 95, 7),
(1007, 1, 1, 4, 5, 13, 49, 2, 250.70, 101, 6),
(1008, 1, 1, 4, 5, 13, 49, 8, 244.40, 95, 9),
(1009, 1, 1, 4, 5, 13, 49, 8, 244.40, 95, 7),
(1010, 1, 1, 4, 5, 13, 49, 8, 244.40, 101, 6),
(1011, 1, 1, 4, 5, 13, 49, 3, 234.90, 95, 9),
(1012, 1, 1, 4, 5, 13, 49, 3, 234.90, 95, 7),
(1013, 1, 1, 4, 5, 13, 49, 3, 234.90, 101, 6),
(1014, 1, 1, 4, 5, 13, 51, 2, 289.15, 95, 9),
(1015, 1, 1, 4, 5, 13, 51, 2, 289.15, 95, 7),
(1016, 1, 1, 4, 5, 13, 51, 2, 289.15, 101, 6),
(1017, 1, 1, 4, 5, 13, 51, 8, 282.85, 95, 9),
(1018, 1, 1, 4, 5, 13, 51, 8, 282.85, 95, 7),
(1019, 1, 1, 4, 5, 13, 51, 8, 282.85, 101, 6),
(1020, 1, 1, 4, 5, 13, 51, 3, 273.35, 95, 9),
(1021, 1, 1, 4, 5, 13, 51, 3, 273.35, 95, 7),
(1022, 1, 1, 4, 5, 13, 51, 3, 273.35, 101, 6),
(1023, 1, 1, 4, 5, 13, 50, 2, 250.70, 95, 9),
(1024, 1, 1, 4, 5, 13, 50, 2, 250.70, 95, 7),
(1025, 1, 1, 4, 5, 13, 50, 2, 250.70, 101, 6),
(1026, 1, 1, 4, 5, 13, 50, 8, 244.40, 95, 9),
(1027, 1, 1, 4, 5, 13, 50, 8, 244.40, 95, 7),
(1028, 1, 1, 4, 5, 13, 50, 8, 244.40, 101, 6),
(1029, 1, 1, 4, 5, 13, 50, 3, 234.90, 95, 9),
(1030, 1, 1, 4, 5, 13, 50, 3, 234.90, 95, 7),
(1031, 1, 1, 4, 5, 13, 50, 3, 234.90, 101, 6),
(1032, 1, 1, 4, 5, 13, 52, 2, 289.15, 95, 9),
(1033, 1, 1, 4, 5, 13, 52, 2, 289.15, 95, 7),
(1034, 1, 1, 4, 5, 13, 52, 2, 289.15, 101, 6),
(1035, 1, 1, 4, 5, 13, 52, 8, 282.85, 95, 9),
(1036, 1, 1, 4, 5, 13, 52, 8, 282.85, 95, 7),
(1037, 1, 1, 4, 5, 13, 52, 8, 282.85, 101, 6),
(1038, 1, 1, 4, 5, 13, 52, 3, 273.35, 95, 9),
(1039, 1, 1, 4, 5, 13, 52, 3, 273.35, 95, 7),
(1040, 1, 1, 4, 5, 13, 52, 3, 273.35, 101, 6),
(1041, 1, 1, 4, 5, 12, 49, 2, 262.90, 95, 9),
(1042, 1, 1, 4, 5, 12, 49, 2, 262.90, 95, 7),
(1043, 1, 1, 4, 5, 12, 49, 2, 262.90, 101, 6),
(1044, 1, 1, 4, 5, 12, 49, 8, 257.60, 95, 9),
(1045, 1, 1, 4, 5, 12, 49, 8, 257.60, 95, 7),
(1046, 1, 1, 4, 5, 12, 49, 8, 257.60, 101, 6),
(1047, 1, 1, 4, 5, 12, 49, 3, 251.30, 95, 9),
(1048, 1, 1, 4, 5, 12, 49, 3, 251.30, 95, 7),
(1049, 1, 1, 4, 5, 12, 49, 3, 251.30, 101, 6),
(1050, 1, 1, 4, 5, 12, 51, 2, 301.35, 95, 9),
(1051, 1, 1, 4, 5, 12, 51, 2, 301.35, 95, 7),
(1052, 1, 1, 4, 5, 12, 51, 2, 301.35, 101, 6),
(1053, 1, 1, 4, 5, 12, 51, 8, 296.05, 95, 9),
(1054, 1, 1, 4, 5, 12, 51, 8, 296.05, 95, 7),
(1055, 1, 1, 4, 5, 12, 51, 8, 296.05, 101, 6),
(1056, 1, 1, 4, 5, 12, 51, 3, 289.75, 95, 9),
(1057, 1, 1, 4, 5, 12, 51, 3, 289.75, 95, 7),
(1058, 1, 1, 4, 5, 12, 51, 3, 289.75, 101, 6),
(1059, 1, 1, 4, 5, 12, 50, 2, 262.90, 95, 9),
(1060, 1, 1, 4, 5, 12, 50, 2, 262.90, 95, 7),
(1061, 1, 1, 4, 5, 12, 50, 2, 262.90, 101, 6),
(1062, 1, 1, 4, 5, 12, 50, 8, 257.60, 95, 9),
(1063, 1, 1, 4, 5, 12, 50, 8, 257.60, 95, 7),
(1064, 1, 1, 4, 5, 12, 50, 8, 257.60, 101, 6),
(1065, 1, 1, 4, 5, 12, 50, 3, 251.30, 95, 9),
(1066, 1, 1, 4, 5, 12, 50, 3, 251.30, 95, 7),
(1067, 1, 1, 4, 5, 12, 50, 3, 251.30, 101, 6),
(1068, 1, 1, 4, 5, 12, 52, 2, 301.35, 95, 9),
(1069, 1, 1, 4, 5, 12, 52, 2, 301.35, 95, 7),
(1070, 1, 1, 4, 5, 12, 52, 2, 301.35, 101, 6),
(1071, 1, 1, 4, 5, 12, 52, 8, 296.05, 95, 9),
(1072, 1, 1, 4, 5, 12, 52, 8, 296.05, 95, 7),
(1073, 1, 1, 4, 5, 12, 52, 8, 296.05, 101, 6),
(1074, 1, 1, 4, 5, 12, 52, 3, 289.75, 95, 9),
(1075, 1, 1, 4, 5, 12, 52, 3, 289.75, 95, 7),
(1076, 1, 1, 4, 5, 12, 52, 3, 289.75, 101, 6),
(1077, 1, 1, 4, 5, 12, 50, 2, 262.90, 94, 10),
(1078, 1, 1, 4, 5, 12, 50, 8, 257.60, 94, 10),
(1079, 1, 1, 4, 5, 12, 50, 3, 251.30, 94, 10),
(1080, 1, 1, 4, 5, 12, 52, 2, 301.35, 94, 10),
(1081, 1, 1, 4, 5, 12, 52, 8, 296.05, 94, 10),
(1082, 1, 1, 4, 5, 12, 52, 3, 289.75, 94, 10),
(1083, 1, 1, 4, 5, 15, 49, 2, 295.80, 109, 9),
(1084, 1, 1, 4, 5, 15, 49, 2, 295.80, 115, 7),
(1085, 1, 1, 4, 5, 15, 49, 2, 295.80, 115, 6),
(1086, 1, 1, 4, 5, 15, 49, 8, 289.50, 109, 9),
(1087, 1, 1, 4, 5, 15, 49, 8, 289.50, 115, 7),
(1088, 1, 1, 4, 5, 15, 49, 8, 289.50, 115, 6),
(1089, 1, 1, 4, 5, 15, 49, 3, 280.10, 109, 9),
(1090, 1, 1, 4, 5, 15, 49, 3, 280.10, 115, 7),
(1091, 1, 1, 4, 5, 15, 49, 3, 280.10, 115, 6),
(1092, 1, 1, 4, 5, 15, 51, 2, 334.25, 109, 9),
(1093, 1, 1, 4, 5, 15, 51, 2, 334.25, 115, 7),
(1094, 1, 1, 4, 5, 15, 51, 2, 334.25, 115, 6),
(1095, 1, 1, 4, 5, 15, 51, 8, 327.95, 109, 9),
(1096, 1, 1, 4, 5, 15, 51, 8, 327.95, 115, 7),
(1097, 1, 1, 4, 5, 15, 51, 8, 327.95, 115, 6),
(1098, 1, 1, 4, 5, 15, 51, 3, 318.55, 109, 9),
(1099, 1, 1, 4, 5, 15, 51, 3, 318.55, 115, 7),
(1100, 1, 1, 4, 5, 15, 51, 3, 318.55, 115, 6),
(1101, 1, 1, 4, 5, 15, 50, 2, 295.80, 109, 9),
(1102, 1, 1, 4, 5, 15, 50, 2, 295.80, 115, 7),
(1103, 1, 1, 4, 5, 15, 50, 2, 295.80, 115, 6),
(1104, 1, 1, 4, 5, 15, 50, 8, 289.50, 109, 9),
(1105, 1, 1, 4, 5, 15, 50, 8, 289.50, 115, 7),
(1106, 1, 1, 4, 5, 15, 50, 8, 289.50, 115, 6),
(1107, 1, 1, 4, 5, 15, 50, 3, 280.10, 109, 9),
(1108, 1, 1, 4, 5, 15, 50, 3, 280.10, 115, 7),
(1109, 1, 1, 4, 5, 15, 50, 3, 280.10, 115, 6),
(1110, 1, 1, 4, 5, 15, 52, 2, 334.25, 109, 9),
(1111, 1, 1, 4, 5, 15, 52, 2, 334.25, 115, 7),
(1112, 1, 1, 4, 5, 15, 52, 2, 334.25, 115, 6),
(1113, 1, 1, 4, 5, 15, 52, 8, 327.95, 109, 9),
(1114, 1, 1, 4, 5, 15, 52, 8, 327.95, 115, 7),
(1115, 1, 1, 4, 5, 15, 52, 8, 327.95, 115, 6),
(1116, 1, 1, 4, 5, 15, 52, 3, 318.55, 109, 9),
(1117, 1, 1, 4, 5, 15, 52, 3, 318.55, 115, 7),
(1118, 1, 1, 4, 5, 15, 52, 3, 318.55, 115, 6),
(1119, 1, 1, 4, 5, 15, 50, 2, 295.80, 94, 10),
(1120, 1, 1, 4, 5, 15, 50, 8, 289.50, 94, 10),
(1121, 1, 1, 4, 5, 15, 50, 3, 280.10, 94, 10),
(1122, 1, 1, 4, 5, 15, 52, 2, 334.25, 94, 10),
(1123, 1, 1, 4, 5, 15, 52, 8, 327.95, 94, 10),
(1124, 1, 1, 4, 5, 15, 52, 3, 318.55, 94, 10),
(1125, 1, 1, 4, 5, 14, 49, 2, 363.10, 109, 9),
(1126, 1, 1, 4, 5, 14, 49, 2, 363.10, 115, 7),
(1127, 1, 1, 4, 5, 14, 49, 2, 363.10, 115, 6),
(1128, 1, 1, 4, 5, 14, 49, 8, 356.80, 109, 9),
(1129, 1, 1, 4, 5, 14, 49, 8, 356.80, 115, 7),
(1130, 1, 1, 4, 5, 14, 49, 8, 356.80, 115, 6),
(1131, 1, 1, 4, 5, 14, 49, 3, 347.30, 109, 9),
(1132, 1, 1, 4, 5, 14, 49, 3, 347.30, 115, 7),
(1133, 1, 1, 4, 5, 14, 49, 3, 347.30, 115, 6),
(1134, 1, 1, 4, 5, 14, 50, 2, 363.10, 109, 9),
(1135, 1, 1, 4, 5, 14, 50, 2, 363.10, 115, 7),
(1136, 1, 1, 4, 5, 14, 50, 2, 363.10, 115, 6),
(1137, 1, 1, 4, 5, 14, 50, 8, 356.80, 109, 9),
(1138, 1, 1, 4, 5, 14, 50, 8, 356.80, 115, 7),
(1139, 1, 1, 4, 5, 14, 50, 8, 356.80, 115, 6),
(1140, 1, 1, 4, 5, 14, 50, 3, 347.30, 109, 9),
(1141, 1, 1, 4, 5, 14, 50, 3, 347.30, 115, 7),
(1142, 1, 1, 4, 5, 14, 50, 3, 347.30, 115, 6),
(1143, 1, 1, 4, 5, 14, 50, 2, 363.10, 94, 10),
(1144, 1, 1, 4, 5, 14, 50, 8, 356.80, 94, 10),
(1145, 1, 1, 4, 5, 14, 50, 3, 347.30, 94, 10),
(1146, 1, 1, 4, 5, 1, 53, 2, 177.50, 116, 10),
(1147, 1, 1, 4, 5, 1, 53, 2, 177.50, 117, 9),
(1148, 1, 1, 4, 5, 1, 53, 2, 177.50, 117, 7),
(1150, 1, 1, 4, 5, 1, 53, 2, 177.50, 117, 6),
(1151, 1, 1, 4, 5, 1, 53, 8, 171.10, 116, 10),
(1152, 1, 1, 4, 5, 1, 53, 8, 171.10, 117, 9),
(1153, 1, 1, 4, 5, 1, 53, 8, 171.10, 117, 7),
(1154, 1, 1, 4, 5, 1, 53, 8, 171.10, 117, 6),
(1155, 1, 1, 4, 5, 1, 53, 3, 161.70, 116, 10),
(1156, 1, 1, 4, 5, 1, 53, 3, 161.70, 117, 9),
(1157, 1, 1, 4, 5, 1, 53, 3, 161.70, 117, 7),
(1158, 1, 1, 4, 5, 1, 53, 3, 161.70, 117, 6),
(1159, 1, 1, 4, 5, 1, 55, 2, 215.95, 116, 10),
(1160, 1, 1, 4, 5, 1, 55, 2, 215.95, 117, 9),
(1161, 1, 1, 4, 5, 1, 55, 2, 215.95, 117, 7),
(1162, 1, 1, 4, 5, 1, 55, 2, 215.95, 117, 6),
(1163, 1, 1, 4, 5, 1, 55, 8, 209.55, 116, 10),
(1164, 1, 1, 4, 5, 1, 55, 8, 209.55, 117, 9),
(1165, 1, 1, 4, 5, 1, 55, 8, 209.55, 117, 7),
(1166, 1, 1, 4, 5, 1, 55, 8, 209.55, 117, 6),
(1167, 1, 1, 4, 5, 1, 55, 3, 200.15, 116, 10),
(1168, 1, 1, 4, 5, 1, 55, 3, 200.15, 117, 9),
(1169, 1, 1, 4, 5, 1, 55, 3, 200.15, 117, 7),
(1170, 1, 1, 4, 5, 1, 55, 3, 200.15, 117, 6),
(1171, 1, 1, 4, 5, 1, 54, 2, 177.50, 116, 10),
(1172, 1, 1, 4, 5, 1, 54, 2, 177.50, 117, 9),
(1173, 1, 1, 4, 5, 1, 54, 2, 177.50, 117, 7),
(1174, 1, 1, 4, 5, 1, 54, 2, 177.50, 117, 6),
(1175, 1, 1, 4, 5, 1, 54, 8, 171.10, 116, 10),
(1176, 1, 1, 4, 5, 1, 54, 8, 171.10, 117, 9),
(1177, 1, 1, 4, 5, 1, 54, 8, 171.10, 117, 7),
(1178, 1, 1, 4, 5, 1, 54, 8, 171.10, 117, 6),
(1179, 1, 1, 4, 5, 1, 54, 3, 161.70, 116, 10),
(1180, 1, 1, 4, 5, 1, 54, 3, 161.70, 117, 9),
(1181, 1, 1, 4, 5, 1, 54, 3, 161.70, 117, 7),
(1182, 1, 1, 4, 5, 1, 54, 3, 161.70, 117, 6),
(1183, 1, 1, 4, 5, 1, 56, 2, 215.95, 116, 10),
(1184, 1, 1, 4, 5, 1, 56, 2, 215.95, 117, 9),
(1185, 1, 1, 4, 5, 1, 56, 2, 215.95, 117, 7),
(1186, 1, 1, 4, 5, 1, 56, 2, 215.95, 117, 6),
(1187, 1, 1, 4, 5, 1, 56, 8, 209.55, 116, 10),
(1188, 1, 1, 4, 5, 1, 56, 8, 209.55, 117, 9),
(1189, 1, 1, 4, 5, 1, 56, 8, 209.55, 117, 7),
(1190, 1, 1, 4, 5, 1, 56, 8, 209.55, 117, 6),
(1191, 1, 1, 4, 5, 1, 56, 3, 200.15, 116, 10),
(1192, 1, 1, 4, 5, 1, 56, 3, 200.15, 117, 9),
(1193, 1, 1, 4, 5, 1, 56, 3, 200.15, 117, 7),
(1194, 1, 1, 4, 5, 1, 56, 3, 200.15, 117, 6),
(1195, 1, 1, 4, 5, 13, 53, 2, 207.40, 117, 9),
(1196, 1, 1, 4, 5, 13, 53, 8, 201.10, 117, 9);
INSERT INTO `pricelist_lenses` (`id_pricelist_lens`, `id_producer_lens`, `id_material_lens`, `id_type_lens`, `id_design_lens`, `id_index_lens`, `id_name_lens`, `id_finishing_lens`, `price_pricelist_lens`, `id_range_dioptre_lens`, `id_diameter_lens`) VALUES
(1197, 1, 1, 4, 5, 13, 53, 3, 191.70, 117, 9),
(1198, 1, 1, 4, 5, 13, 55, 2, 245.85, 117, 9),
(1199, 1, 1, 4, 5, 13, 55, 8, 239.55, 117, 9),
(1200, 1, 1, 4, 5, 13, 55, 3, 230.15, 117, 9),
(1201, 1, 1, 4, 5, 13, 54, 2, 207.40, 117, 9),
(1202, 1, 1, 4, 5, 13, 54, 8, 201.10, 117, 9),
(1203, 1, 1, 4, 5, 13, 54, 3, 191.70, 117, 9),
(1204, 1, 1, 4, 5, 13, 56, 2, 245.85, 117, 9),
(1205, 1, 1, 4, 5, 13, 56, 8, 239.55, 117, 9),
(1206, 1, 1, 4, 5, 13, 56, 3, 230.15, 117, 9),
(1207, 1, 1, 4, 5, 12, 53, 2, 213.10, 116, 10),
(1208, 1, 1, 4, 5, 12, 53, 2, 213.10, 118, 9),
(1209, 1, 1, 4, 5, 12, 53, 2, 213.10, 119, 7),
(1210, 1, 1, 4, 5, 12, 53, 8, 206.80, 116, 10),
(1211, 1, 1, 4, 5, 12, 53, 8, 206.80, 118, 9),
(1212, 1, 1, 4, 5, 12, 53, 8, 206.80, 119, 7),
(1213, 1, 1, 4, 5, 12, 53, 3, 197.30, 116, 10),
(1214, 1, 1, 4, 5, 12, 53, 3, 197.30, 118, 9),
(1215, 1, 1, 4, 5, 12, 53, 3, 197.30, 119, 7),
(1216, 1, 1, 4, 5, 12, 55, 2, 251.55, 116, 10),
(1217, 1, 1, 4, 5, 12, 55, 2, 251.55, 118, 9),
(1218, 1, 1, 4, 5, 12, 55, 2, 251.55, 119, 7),
(1219, 1, 1, 4, 5, 12, 55, 8, 245.25, 116, 10),
(1220, 1, 1, 4, 5, 12, 55, 8, 245.25, 118, 9),
(1221, 1, 1, 4, 5, 12, 55, 8, 245.25, 119, 7),
(1222, 1, 1, 4, 5, 12, 55, 3, 235.75, 116, 10),
(1223, 1, 1, 4, 5, 12, 55, 3, 235.75, 118, 9),
(1224, 1, 1, 4, 5, 12, 55, 3, 235.75, 119, 7),
(1225, 1, 1, 4, 5, 12, 54, 2, 213.10, 116, 10),
(1226, 1, 1, 4, 5, 12, 54, 2, 213.10, 118, 9),
(1227, 1, 1, 4, 5, 12, 54, 2, 213.10, 119, 7),
(1228, 1, 1, 4, 5, 12, 54, 8, 206.80, 116, 10),
(1229, 1, 1, 4, 5, 12, 54, 8, 206.80, 118, 9),
(1230, 1, 1, 4, 5, 12, 54, 8, 206.80, 119, 7),
(1231, 1, 1, 4, 5, 12, 54, 3, 197.30, 116, 10),
(1232, 1, 1, 4, 5, 12, 54, 3, 197.30, 118, 9),
(1233, 1, 1, 4, 5, 12, 54, 3, 197.30, 119, 7),
(1234, 1, 1, 4, 5, 12, 56, 2, 251.55, 116, 10),
(1235, 1, 1, 4, 5, 12, 56, 2, 251.55, 118, 9),
(1236, 1, 1, 4, 5, 12, 56, 2, 251.55, 119, 7),
(1237, 1, 1, 4, 5, 12, 56, 8, 245.25, 116, 10),
(1238, 1, 1, 4, 5, 12, 56, 8, 245.25, 118, 9),
(1239, 1, 1, 4, 5, 12, 56, 8, 245.25, 119, 7),
(1240, 1, 1, 4, 5, 12, 56, 3, 235.75, 116, 10),
(1241, 1, 1, 4, 5, 12, 56, 3, 235.75, 118, 9),
(1242, 1, 1, 4, 5, 12, 56, 3, 235.75, 119, 7),
(1243, 1, 1, 4, 5, 15, 53, 2, 245.80, 116, 10),
(1244, 1, 1, 4, 5, 15, 53, 2, 242.80, 117, 9),
(1245, 1, 1, 4, 5, 15, 53, 2, 242.80, 120, 7),
(1246, 1, 1, 4, 5, 15, 53, 8, 236.50, 116, 10),
(1247, 1, 1, 4, 5, 15, 53, 8, 236.50, 117, 9),
(1248, 1, 1, 4, 5, 15, 53, 8, 236.50, 120, 7),
(1249, 1, 1, 4, 5, 15, 53, 3, 227.00, 116, 10),
(1250, 1, 1, 4, 5, 15, 53, 3, 227.00, 117, 9),
(1251, 1, 1, 4, 5, 15, 53, 3, 227.00, 120, 7),
(1252, 1, 1, 4, 5, 15, 55, 2, 281.25, 116, 10),
(1253, 1, 1, 4, 5, 15, 55, 2, 281.25, 117, 9),
(1254, 1, 1, 4, 5, 15, 55, 2, 281.25, 120, 7),
(1255, 1, 1, 4, 5, 15, 55, 8, 274.95, 116, 10),
(1256, 1, 1, 4, 5, 15, 55, 8, 274.95, 117, 9),
(1257, 1, 1, 4, 5, 15, 55, 8, 274.95, 120, 7),
(1258, 1, 1, 4, 5, 15, 55, 3, 265.45, 116, 10),
(1259, 1, 1, 4, 5, 15, 55, 3, 265.45, 117, 9),
(1260, 1, 1, 4, 5, 15, 55, 3, 265.45, 120, 7),
(1261, 1, 1, 4, 5, 15, 54, 2, 245.80, 116, 10),
(1262, 1, 1, 4, 5, 15, 54, 2, 242.80, 117, 9),
(1263, 1, 1, 4, 5, 15, 54, 2, 242.80, 120, 7),
(1264, 1, 1, 4, 5, 15, 54, 8, 236.50, 116, 10),
(1265, 1, 1, 4, 5, 15, 54, 8, 236.50, 117, 9),
(1266, 1, 1, 4, 5, 15, 54, 8, 236.50, 120, 7),
(1267, 1, 1, 4, 5, 15, 54, 3, 227.00, 116, 10),
(1268, 1, 1, 4, 5, 15, 54, 3, 227.00, 117, 9),
(1269, 1, 1, 4, 5, 15, 54, 3, 227.00, 120, 7),
(1270, 1, 1, 4, 5, 15, 56, 2, 281.25, 116, 10),
(1271, 1, 1, 4, 5, 15, 56, 2, 281.25, 117, 9),
(1272, 1, 1, 4, 5, 15, 56, 2, 281.25, 120, 7),
(1273, 1, 1, 4, 5, 15, 56, 8, 274.95, 116, 10),
(1274, 1, 1, 4, 5, 15, 56, 8, 274.95, 117, 9),
(1275, 1, 1, 4, 5, 15, 56, 8, 274.95, 120, 7),
(1276, 1, 1, 4, 5, 15, 56, 3, 265.45, 116, 10),
(1277, 1, 1, 4, 5, 15, 56, 3, 265.45, 117, 9),
(1278, 1, 1, 4, 5, 15, 56, 3, 265.45, 120, 7);

-- --------------------------------------------------------

--
-- Table structure for table `producers_lenses`
--

CREATE TABLE `producers_lenses` (
  `id_producer_lens` int(11) NOT NULL,
  `name_producer_lens` text COLLATE utf8_unicode_ci NOT NULL,
  `address_producer_lens` text COLLATE utf8_unicode_ci NOT NULL,
  `city_producer_lens` text COLLATE utf8_unicode_ci NOT NULL,
  `state_producer_lens` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_producer_lens` text COLLATE utf8_unicode_ci NOT NULL,
  `email_producer_lens` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `producers_lenses`
--

INSERT INTO `producers_lenses` (`id_producer_lens`, `name_producer_lens`, `address_producer_lens`, `city_producer_lens`, `state_producer_lens`, `phone_producer_lens`, `email_producer_lens`) VALUES
(1, 'HOYA D.O.O.', 'Neka adressa', 'Beograd', 'Srbija', '+38111254874', 'jabihda@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ranges_dioptre_lenses`
--

CREATE TABLE `ranges_dioptre_lenses` (
  `id_range_dioptre_lens` int(11) NOT NULL,
  `id_min_sph_range_dioptre_lens` int(11) NOT NULL,
  `id_max_sph_range_dioptre_lens` int(11) NOT NULL,
  `cyl_range_dioptre_lens` decimal(11,2) NOT NULL,
  `add_range_dioptre_lens` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranges_dioptre_lenses`
--

INSERT INTO `ranges_dioptre_lenses` (`id_range_dioptre_lens`, `id_min_sph_range_dioptre_lens`, `id_max_sph_range_dioptre_lens`, `cyl_range_dioptre_lens`, `add_range_dioptre_lens`) VALUES
(23, 15, 13, 1.00, NULL),
(24, 16, 14, 1.00, NULL),
(25, 15, 17, 2.00, NULL),
(26, 18, 14, 2.00, NULL),
(31, 15, 19, 3.00, NULL),
(33, 20, 19, 3.00, NULL),
(34, 20, 17, 3.00, NULL),
(35, 20, 19, 2.00, NULL),
(36, 15, 19, 2.00, NULL),
(37, 20, 14, 2.00, NULL),
(38, 21, 17, 0.00, NULL),
(39, 22, 17, 2.00, NULL),
(40, 15, 13, 0.00, NULL),
(41, 16, 14, 0.00, NULL),
(42, 24, 23, 2.00, NULL),
(43, 26, 25, 2.00, NULL),
(44, 22, 18, 2.00, NULL),
(45, 22, 14, 2.00, NULL),
(46, 26, 25, 3.00, NULL),
(47, 22, 14, 3.00, NULL),
(48, 27, 19, 2.00, NULL),
(49, 15, 28, 2.00, NULL),
(50, 29, 14, 2.00, NULL),
(51, 22, 30, 2.00, NULL),
(52, 31, 14, 2.00, NULL),
(53, 27, 19, 3.00, NULL),
(54, 15, 28, 3.00, NULL),
(55, 22, 30, 3.00, NULL),
(56, 31, 14, 3.00, NULL),
(57, 22, 28, 2.00, NULL),
(58, 22, 32, 6.00, NULL),
(59, 26, 33, 6.00, NULL),
(60, 22, 17, 6.00, NULL),
(62, 34, 35, 6.00, NULL),
(63, 38, 37, 6.00, NULL),
(64, 36, 38, 0.00, NULL),
(65, 26, 19, 4.00, NULL),
(66, 34, 19, 4.00, NULL),
(67, 39, 40, 4.00, NULL),
(68, 22, 41, 4.00, NULL),
(69, 22, 35, 4.00, NULL),
(70, 26, 28, 4.00, NULL),
(71, 26, 35, 4.00, NULL),
(72, 39, 27, 4.00, NULL),
(73, 26, 44, 4.00, NULL),
(74, 42, 14, 4.00, NULL),
(75, 22, 28, 4.00, NULL),
(76, 43, 33, 4.00, NULL),
(77, 42, 14, 3.75, NULL),
(78, 22, 28, 5.00, NULL),
(79, 26, 19, 5.00, NULL),
(80, 43, 33, 5.00, NULL),
(81, 20, 28, 4.00, NULL),
(82, 22, 19, 4.00, NULL),
(83, 26, 46, 4.00, NULL),
(84, 19, 33, 0.00, NULL),
(85, 22, 14, 4.00, NULL),
(86, 34, 45, 4.00, NULL),
(87, 34, 35, 4.00, NULL),
(88, 43, 19, 4.00, NULL),
(89, 43, 35, 4.00, NULL),
(90, 37, 47, 4.00, NULL),
(91, 48, 39, 4.00, NULL),
(93, 22, 17, 4.00, 3.50),
(94, 20, 13, 4.00, 3.50),
(95, 22, 19, 4.00, 3.50),
(96, 42, 50, 4.00, NULL),
(97, 42, 51, 4.00, NULL),
(98, 42, 52, 4.00, NULL),
(99, 22, 53, 4.00, 3.50),
(100, 22, 51, 5.00, 3.50),
(101, 22, 19, 6.00, 3.50),
(102, 22, 28, 4.00, 3.50),
(103, 22, 19, 5.00, 3.50),
(104, 22, 50, 4.00, 3.50),
(105, 22, 50, 6.00, 3.50),
(106, 26, 25, 4.00, 3.50),
(107, 54, 35, 6.00, 3.50),
(108, 20, 13, 6.00, 3.50),
(109, 26, 19, 4.00, 3.50),
(110, 34, 35, 6.00, 3.50),
(111, 43, 33, 6.00, 3.50),
(112, 22, 35, 6.00, 3.50),
(113, 26, 35, 6.00, 3.50),
(114, 24, 35, 6.00, 3.50),
(115, 34, 35, 4.00, 3.50),
(116, 20, 13, 6.00, 4.00),
(117, 26, 19, 6.00, 4.00),
(118, 22, 19, 6.00, 4.00),
(119, 26, 35, 6.00, 4.00),
(120, 34, 35, 6.00, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `right_left`
--

CREATE TABLE `right_left` (
  `id_right_left` int(11) NOT NULL,
  `name_right_left` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `right_left`
--

INSERT INTO `right_left` (`id_right_left`, `name_right_left`) VALUES
(1, 'Desno'),
(2, 'Levo'),
(3, 'Oba');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id_seller` int(11) NOT NULL,
  `name_seller` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id_seller`, `name_seller`) VALUES
(2, 'Veljko Fridl'),
(5, 'Natasa Stanišić'),
(6, 'Djulistana Ibrol');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `title_slider` text COLLATE utf8_unicode_ci,
  `text_slider` text COLLATE utf8_unicode_ci,
  `name_pic_slider` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_slider` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `title_slider`, `text_slider`, `name_pic_slider`, `pic_slider`) VALUES
(1, NULL, NULL, 'kontaktna sočiva', 'kontaktna-sociva.jpg'),
(2, NULL, NULL, 'feb 2019', 'eye-care-cover-feb-2017.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sph_range_dioptre_lenses`
--

CREATE TABLE `sph_range_dioptre_lenses` (
  `id_sph_range_dioptre_lens` int(11) NOT NULL,
  `value_sph_range_dioptre_lens` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sph_range_dioptre_lenses`
--

INSERT INTO `sph_range_dioptre_lenses` (`id_sph_range_dioptre_lens`, `value_sph_range_dioptre_lens`) VALUES
(13, 3.00),
(14, 0.00),
(15, 0.25),
(16, -3.00),
(17, 4.00),
(18, -4.00),
(19, 6.00),
(20, -6.00),
(21, 1.00),
(22, -8.00),
(23, -10.25),
(24, -12.00),
(25, -8.25),
(26, -10.00),
(27, 2.25),
(28, 2.00),
(29, -7.50),
(30, -7.25),
(31, -7.00),
(32, 2.50),
(33, 10.00),
(34, -13.00),
(35, 8.00),
(36, -20.00),
(37, 12.00),
(38, -18.25),
(39, -4.50),
(40, -0.75),
(41, 6.50),
(42, -5.00),
(43, -15.00),
(44, 4.50),
(45, 9.00),
(46, 5.75),
(47, 22.00),
(48, -30.00),
(50, 5.00),
(51, 3.50),
(52, 7.00),
(53, 1.50),
(54, -11.00);

-- --------------------------------------------------------

--
-- Table structure for table `text_site`
--

CREATE TABLE `text_site` (
  `id_text_site` int(11) NOT NULL,
  `title_text_site` text COLLATE utf8_unicode_ci NOT NULL,
  `text_text_site_1` text COLLATE utf8_unicode_ci,
  `text_text_site_2` text COLLATE utf8_unicode_ci,
  `pic_text_site` text COLLATE utf8_unicode_ci,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `text_site`
--

INSERT INTO `text_site` (`id_text_site`, `title_text_site`, `text_text_site_1`, `text_text_site_2`, `pic_text_site`, `id_menu`) VALUES
(1, 'EYE CARE', 'Eye Care Optika se sastoji iz prodajnog dela i laboratorije za ugradnju i popravku. Prodajni deo poseduje veliki izbor dioptrijskih ramova i sunčanih naočara. Redovno istražujemo nove svetske trendove.', 'Naša ponuda:', 'mr-orange-2.jpg', 2),
(2, 'PREGLEDI', 'Kod nas možete obaviti:', 'Eye Care Oftalmologija predstavlja specijalističku ordinaciju u kojoj je dobrobit pacijenta glavni prioritet. Omogućava dijagnostiku i stručno lečenje niza očnih bolesti, proveru vida i precizno odredjivanje potrebne korektivne dioptrije. Najsavremenija aparatura dopunjuje stručnost osoblja i omogućava sveobuhvatni očni pregled, praćenje i terapiju.', NULL, 4),
(3, 'KABINET ZA KONTAKTNA SOČIVA', 'Eye Care Kontaktologija poseduje veliki broj probnih setova mekih kao i gas propusnih polu tvrdih (RGP) sočiva. Uz najsavremeniji kornealni topograf koji vrši mapiranje površine oka na više od 100.000 tačaka, odredjuje se dizajn sočiva koji je u potpunosti prilagodjen Vašem oku. Na ovaj način možemo stručno rešiti i najkompleksnije refrakcione zahteve.', 'Kod nas mozete obaviti:', 'uvod.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `type_lenses`
--

CREATE TABLE `type_lenses` (
  `id_type_lens` int(11) NOT NULL,
  `name_type_lens` text COLLATE utf8_unicode_ci NOT NULL,
  `order_type_lens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_lenses`
--

INSERT INTO `type_lenses` (`id_type_lens`, `name_type_lens`, `order_type_lens`) VALUES
(1, 'Lager', 1),
(2, 'Monofokali', 2),
(3, 'Kancelariska sočiva', 3),
(4, 'Progresivi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` text COLLATE utf8_unicode_ci NOT NULL,
  `password_user` text COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `password_user`, `id_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'prodavac', '1576249b404cc5134b39baddc44be698', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `designs_lenses`
--
ALTER TABLE `designs_lenses`
  ADD PRIMARY KEY (`id_design_lens`);

--
-- Indexes for table `diameter_lenses`
--
ALTER TABLE `diameter_lenses`
  ADD PRIMARY KEY (`id_diameter_lens`);

--
-- Indexes for table `distance_proximity`
--
ALTER TABLE `distance_proximity`
  ADD PRIMARY KEY (`id_distance_proximity`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id_equipment`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`id_exchange`);

--
-- Indexes for table `finishing_lenses`
--
ALTER TABLE `finishing_lenses`
  ADD PRIMARY KEY (`id_finishing_lens`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_seller` (`id_seller`,`id_customer`,`id_exchange`,`id_distance_proximity`);

--
-- Indexes for table `index_lenses`
--
ALTER TABLE `index_lenses`
  ADD PRIMARY KEY (`id_index_lens`);

--
-- Indexes for table `list_site`
--
ALTER TABLE `list_site`
  ADD PRIMARY KEY (`id_list_site`),
  ADD KEY `id_text_site` (`id_text_site`);

--
-- Indexes for table `material_lenses`
--
ALTER TABLE `material_lenses`
  ADD PRIMARY KEY (`id_material_lens`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `name_lenses`
--
ALTER TABLE `name_lenses`
  ADD PRIMARY KEY (`id_name_lens`);

--
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id_order_list`),
  ADD KEY `id_form` (`id_form`,`id_pricelist_lens_right`,`id_pricelist_lens_left`,`id_order_status`,`id_right_left`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Indexes for table `pricelist_lenses`
--
ALTER TABLE `pricelist_lenses`
  ADD PRIMARY KEY (`id_pricelist_lens`),
  ADD KEY `id_producer_lens` (`id_producer_lens`,`id_material_lens`,`id_type_lens`,`id_design_lens`,`id_index_lens`,`id_name_lens`,`id_finishing_lens`,`id_range_dioptre_lens`,`id_diameter_lens`);

--
-- Indexes for table `producers_lenses`
--
ALTER TABLE `producers_lenses`
  ADD PRIMARY KEY (`id_producer_lens`);

--
-- Indexes for table `ranges_dioptre_lenses`
--
ALTER TABLE `ranges_dioptre_lenses`
  ADD PRIMARY KEY (`id_range_dioptre_lens`),
  ADD KEY `id_min_sph_range_dioptre_lens` (`id_min_sph_range_dioptre_lens`,`id_max_sph_range_dioptre_lens`);

--
-- Indexes for table `right_left`
--
ALTER TABLE `right_left`
  ADD PRIMARY KEY (`id_right_left`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id_seller`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `sph_range_dioptre_lenses`
--
ALTER TABLE `sph_range_dioptre_lenses`
  ADD PRIMARY KEY (`id_sph_range_dioptre_lens`);

--
-- Indexes for table `text_site`
--
ALTER TABLE `text_site`
  ADD PRIMARY KEY (`id_text_site`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `type_lenses`
--
ALTER TABLE `type_lenses`
  ADD PRIMARY KEY (`id_type_lens`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designs_lenses`
--
ALTER TABLE `designs_lenses`
  MODIFY `id_design_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diameter_lenses`
--
ALTER TABLE `diameter_lenses`
  MODIFY `id_diameter_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `distance_proximity`
--
ALTER TABLE `distance_proximity`
  MODIFY `id_distance_proximity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id_equipment` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id_exchange` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `finishing_lenses`
--
ALTER TABLE `finishing_lenses`
  MODIFY `id_finishing_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `index_lenses`
--
ALTER TABLE `index_lenses`
  MODIFY `id_index_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `list_site`
--
ALTER TABLE `list_site`
  MODIFY `id_list_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `material_lenses`
--
ALTER TABLE `material_lenses`
  MODIFY `id_material_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `name_lenses`
--
ALTER TABLE `name_lenses`
  MODIFY `id_name_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id_order_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pricelist_lenses`
--
ALTER TABLE `pricelist_lenses`
  MODIFY `id_pricelist_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1279;

--
-- AUTO_INCREMENT for table `producers_lenses`
--
ALTER TABLE `producers_lenses`
  MODIFY `id_producer_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ranges_dioptre_lenses`
--
ALTER TABLE `ranges_dioptre_lenses`
  MODIFY `id_range_dioptre_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `right_left`
--
ALTER TABLE `right_left`
  MODIFY `id_right_left` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sph_range_dioptre_lenses`
--
ALTER TABLE `sph_range_dioptre_lenses`
  MODIFY `id_sph_range_dioptre_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `text_site`
--
ALTER TABLE `text_site`
  MODIFY `id_text_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_lenses`
--
ALTER TABLE `type_lenses`
  MODIFY `id_type_lens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
