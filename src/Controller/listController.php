<?PHP

namespace App\Controller;

use App\Entity\Gift;
use App\Repository\GiftRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class listController extends AbstractController
{
    /**
     * @Route("/maliste", name="liste_index")
     */
    public function index()
    {
        return $this->render('Liste/index.html.twig', []);
    }

    /**
     * @Route("/maliste/ajouter/{id}", name="liste_ajouter")
     */
    public function add($id, Request $request){
        $session = $request->getSession();
        $liste = $session->get('liste', []);
        $liste[$id]=1;
        $session->set('liste', $liste);
        
        return $this -> redirectToRoute('liste_voir');
        dd($session->get('liste'));

    }

/**
 * @Route("/maliste/voir", name="liste_voir")
 */
public function voirListe(Request $request, GiftRepository $giftRepository)
{
    $liste = $request->getSession()->get('liste', []);

    // Fetch all gifts
    $allGifts = $giftRepository->findAll();

    // Filter gifts based on the IDs in the list
    $gifts = array_filter($allGifts, function (Gift $gift) use ($liste) {
        return in_array($gift->getId(), array_keys($liste));
    });

    return $this->render('Liste/voir.html.twig', [
        'liste' => $liste,
        'gifts' => $gifts,
    ]);
}

/**
 * @Route("/maliste/retirer/{id}", name="liste_retirer")
 */
public function retirer($id, Request $request){
    $session = $request->getSession();
    $liste = $session->get('liste', []);

    if(!empty ($liste[$id])){
        unset($liste[$id]);
    }

    $session->set('liste', $liste);
    return $this -> redirectToRoute('liste_voir');
}
}