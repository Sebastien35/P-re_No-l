<?PHP

namespace App\Controller;

use App\Entity\Gift;
use App\Entity\Wishlist;
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

/**
 * @Route("/maliste/message", name="liste_message" methods={"POST"})
 */
public function message(Request $request, EntityManagerInterface $entityManager)
{
    $message = $request->request->get('message', '');
    $liste = $request->getSession()->get('liste', []);

    // Fetch all gifts
    $gifts = $entityManager->getRepository(Gift::class)->findBy(['id' => array_keys($liste)]);

    // Create a new Wishlist entity
    $wishlist = new Wishlist();
    $wishlist->setMessage($message);
    
    foreach ($gifts as $gift) {
        $wishlist->addGift($gift);
    }

    // Persist the Wishlist entity to the database
    $entityManager->persist($wishlist);
    $entityManager->flush();

    // Clear the session after saving to the database
    $request->getSession()->remove('liste');

    return $this->redirectToRoute('liste_voir');
}


 }
