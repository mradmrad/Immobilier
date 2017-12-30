<?php
namespace SBC\GeoTunisieBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use SBC\GeoTunisieBundle\Entity\Gouvernorat;
use SBC\GeoTunisieBundle\Entity\Ville;

class LoadGourvernoratsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $json_list =   '{"GOUVERNORATS":[
        {"name":"Tunis"
        ,"villes":
        [{"name":"Bab El Bhar"},{"name":"Bab Souika"},{"name":"Carthage"},{"name":"Cité El Khadra"},{"name":"Djebel Jelloud"},{"name":"El Kabaria"},{"name":"El Menzah"},{"name":"Les Jardins de Carthage"},{"name":"El Omrane"},
        {"name":"El Omrane supérieur"},
        {"name":"El Ouardia"},
        {"name":"Ettahrir"},
        
        {"name":"Hraïria"},
        {"name":"La Goulette"},
        {"name":"La Marsa"},
        {"name":"Le Bardo"},
        {"name":"Le Kram"},
        {"name":"Médina"},
        {"name":"Séjoumi"},
        {"name":"Sidi El Béchir"},
        {"name":"Sidi Hassine"},
        {"name":"sqdsddf"}]},
        {"name":"Ariana",
        "villes":[{"name":"Ariana Ville"}
        ,{"name":"Ettadhamen"},
        {"name":"Kalâat el-Andalous"},
        {"name":"La Soukra"},{"name":"Mnihla"},
        {"name":"Raoued"},{"name":"Sidi Thabet"},
        {"name":"arnaout"}]},
        {"name":"Manouba","villes":[{"name":"Borj El Amri"},{"name":"Djedeida"},
        {"name":"Douar Hicher"},{"name":"El Batan"},{"name":"La Manouba"},
        {"name":"Mornaguia"},{"name":"Oued Ellil"},{"name":"Tebourba"}]},
        {"name":"Ben Arous","villes":[{"name":"Ben Arous"},
        {"name":"Bou Mhel el-Bassatine"},
        {"name":"El Mourouj"},{"name":"Ezzahra"},{"name":"Fouchana"},
        {"name":"Hammam Chott"}
        ,{"name":"Hammam Lif"},{"name":"Mohamedia"},{"name":"Medina Jedida"},
        {"name":"Sidi Rezig"},{"name":"Mégrine"},{"name":"Mornag"},{"name":"Radès"},
        {"name":"ssssssssssssssazeazeazeaze"},{"name":"slimen"}]},
        {"name":"Nabeul","villes":[{"name":"Béni Khalled"},{"name":"Béni Khiar"},
        {"name":"Bou Argoub"},{"name":"Dar Châabane El Fehri"},{"name":"El Haouaria"},
        {"name":"El Mida"},{"name":"Grombalia"},{"name":"Hammam Ghezèze"},
        {"name":"Hammamet"},{"name":"Kélibia"},{"name":"Korba"},
        {"name":"Menzel Bouzelfa"},{"name":"Menzel Temime"},{"name":"Nabeul"},
        {"name":"Soliman"},{"name":"Takelsa"}]},
        {"name":"Bizerte","villes":[{"name":"Bizerte Nord"},{"name":"Bizerte Sud"},
        {"name":"El Alia"},{"name":"Ghar El Melh"},
        {"name":"Ghezala"},{"name":"Joumine"},
        {"name":"Mateur"},{"name":"Menzel Bourguiba"},
        {"name":"Menzel Jemil"},{"name":"Ras Jebel"},{"name":"Sejnane"},
        {"name":"Tinja"},{"name":"Utique"},{"name":"Zarzouna"}]},
        {"name":"Zaghouan","villes":[{"name":"Bir Mcherga"},{"name":"El Fahs"},
        {"name":"Nadhour"},{"name":"Saouaf"},{"name":"Zaghouan"},{"name":"Zriba"}]},
        {"name":"Sousse","villes":[{"name":"Akouda"},{"name":"Bouficha"},{"name":"Enfida"},
        {"name":"Hammam Sousse"},{"name":"Hergla"},{"name":"Kalâa Kebira"},
        {"name":"Kalâa Seghira"},{"name":"Kondar"},{"name":"Msaken"},{"name":"Sidi Bou Ali"},
        {"name":"Sidi El Hani"},{"name":"Sousse Jawhara"},{"name":"Sousse Médina"},
        {"name":"Sousse Riadh"},{"name":"Sousse Sidi Abdelhamid"}]},
        {"name":"Monastir","villes":[{"name":"Bekalta"},{"name":"Bembla"},
        {"name":"Beni Hassen"},{"name":"Jemmal"},{"name":"Ksar Hellal"},
        {"name":"Ksibet el-Médiouni"},{"name":"Moknine"},{"name":"Monastir"},
        {"name":"Ouerdanine"},{"name":"Sahline"},{"name":"Sayada-Lamta-Bou Hajar"},
        {"name":"Téboulba"},{"name":"Zéramdine"}]},
        {"name":"Mahdia","villes":[{"name":"Bou Merdes"},
        {"name":"Chebba"},{"name":"Chorbane"},{"name":"El Jem"},
        {"name":"Essouassi"},{"name":"Hebira"},{"name":"Ksour Essef"},
        {"name":"Mahdia"},{"name":"Melloulèche"},{"name":"Ouled Chamekh"},
        {"name":"Sidi Alouane"}]},{"name":"Sfax","villes":[{"name":"Agareb"},
        {"name":"Bir Ali Ben Khalifa"},{"name":"El Amra"},{"name":"El Hencha"},
        {"name":"Graïba"},{"name":"Jebiniana"},{"name":"Kerkennah"},{"name":"Mahrès"},
        {"name":"Menzel Chaker"},{"name":"Sakiet Eddaïer"},{"name":"Sakiet Ezzit"},
        {"name":"Sfax Ouest"},{"name":"Sfax Sud"},{"name":"Sfax Ville"},{"name":"Skhira"},
        {"name":"Thyna"}]},{"name":"Béja","villes":[{"name":"Amdoun"},{"name":"Béja Nord"},
        {"name":"Béja Sud"},{"name":"Goubellat"},{"name":"Medjez el-Bab"},{"name":"Nefza"},
        {"name":"Téboursouk"},{"name":"our"},{"name":"Thibar"}]},
        {"name":"Jendouba","villes":[{"name":"Aïn Draham"},
        {"name":"Balta-Bou Aouane"},{"name":"Bou Salem"},{"name":"Fernana"},
        {"name":"Ghardimaou"},{"name":"Jendouba Sud"},{"name":"Jendouba Nord"},
        {"name":"Oued Meliz"},{"name":"Tabarka"}]},
        {"name":"ElKef","villes":[{"name":"Dahmani"},{"name":"Jérissa"},
        {"name":"El Ksour"},{"name":"Sers"},{"name":"Kalâat Khasba"},
        {"name":"Kalaat Senan"},{"name":"Kef Est"},{"name":"Kef Ouest"},
        {"name":"Nebeur"},{"name":"Sakiet Sidi Youssef"},{"name":"Tajerouine"}]},
        {"name":"Siliana","villes":[{"name":"Bargou"},{"name":"Bou Arada"},
        {"name":"El Aroussa"},{"name":"El Krib"},{"name":"Gaâfour"},{"name":"Kesra"},
        {"name":"Makthar"},{"name":"Rouhia"},{"name":"Sidi Bou Rouis"},
        {"name":"Siliana Nord"},{"name":"Siliana Sud"}]},
        {"name":"Kairouan","villes":[{"name":"Bou Hajla"},{"name":"Chebika"},
        {"name":"Echrarda"},{"name":"El Alâa"},{"name":"Haffouz"},
        {"name":"Hajeb El Ayoun"},{"name":"Kairouan Nord"},{"name":"Kairouan Sud"},
        {"name":"Nasrallah"},{"name":"Oueslatia"},{"name":"Sbikha"}]},
        {"name":"Sidi Bouzid","villes":[{"name":"Bir El Hafey"},
        {"name":"Cebbala Ouled Asker"},{"name":"Jilma"},{"name":"Meknassy"},
        {"name":"Menzel Bouzaiane"},{"name":"Mezzouna"},{"name":"Ouled Haffouz"},
        {"name":"Regueb"},{"name":"Sidi Ali Ben Aoun"},{"name":"Sidi Bouzid Est"},
        {"name":"Sidi Bouzid Ouest"},{"name":"Souk Jedid"}]},
        {"name":"Kasserine","villes":[{"name":"El Ayoun"},
        {"name":"Fériana"},{"name":"Foussana"},{"name":"Haïdra"},
        {"name":"Hassi El Ferid"},{"name":"Jedelienne"},{"name":"Kasserine Nord"},
        {"name":"Kasserine Sud"},{"name":"Majel Bel Abbès"},{"name":"Sbeïtla"},
        {"name":"Sbiba"},{"name":"Thala"}]},
        {"name":"Gabès","villes":[{"name":"Gabès Médina"},{"name":"Gabès Ouest"},
        {"name":"Gabès Sud"},{"name":"Ghannouch"},{"name":"El Hamma"},
        {"name":"Matmata"},{"name":"Mareth"},{"name":"Menzel El Habib"},
        {"name":"Métouia"},{"name":"Nouvelle Matmata"}]},
        {"name":"Médenine","villes":[{"name":"Ben Gardane"},
        {"name":"Beni Khedache"},{"name":"Djerba - Ajim"},
        {"name":"Djerba - Houmt Souk"},{"name":"Djerba - Midoun"},
        {"name":"Médenine Nord"},{"name":"Médenine Sud"},
        {"name":"Sidi Makhlouf"},{"name":"Zarzis"}]},
        {"name":"Gafsa","villes":[{"name":"Belkhir"},{"name":"El Guettar"},
        {"name":"El Ksar"},{"name":"Gafsa Nord"},{"name":"Gafsa Sud"},
        {"name":"Mdhila"},{"name":"Métlaoui"},{"name":"Moularès"},
        {"name":"Redeyef"},{"name":"Sened"},{"name":"Sidi Aïch"}]},
        {"name":"Tozeur","villes":[{"name":"Degache"},{"name":"Hazoua"},
        {"name":"Nefta"},{"name":"Tameghza"},{"name":"Tozeur"}]},
        {"name":"Tataouine","villes":[{"name":"Bir Lahmar"},{"name":"Dehiba"},
        {"name":"Ghomrassen"},{"name":"Remada"},{"name":"Smâr"},
        {"name":"Tataouine Nord"},{"name":"Tataouine Sud"}]},
        {"name":"Kébili","villes":[{"name":"Douz Nord"},
        {"name":"Douz Sud"},{"name":"Faouar"},{"name":"Kébili Nord"},
        {"name":"Kébili Sud"},{"name":"Souk Lahad"}]}]}';
        $govs = json_decode($json_list)->GOUVERNORATS;


        foreach ($govs as $governorate){
            $g = new Gouvernorat();
            $g->setName($governorate->name);
            $manager->persist($g);

            foreach ($governorate->villes as $ville){
                $v = new Ville();
                $v->setGouvernorat($g);
                $v->setName($ville->name);
                $manager->persist($v);

            }
        }
        $manager->flush();
    }
}