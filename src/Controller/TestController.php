<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    #Dans Symfony, toutes les fonctions liées avec uen route doivent retourner une objet de la classe Response <!DOCTYPE html>

    #Les noms des fichiers twig sont toujours donnés a partir du dossier 𝙩𝙚𝙢𝙥𝙡𝙖𝙩𝙚.
    #Les fichiers auront toujours l'extensuin .𝙝𝙩𝙢𝙡.𝙩𝙬𝙞𝙜


    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    #[Route("/test-base", name: "app_test_base")]
    public function test()
    {
        return $this->render("base.html.twig", [
            "nombre" => 5,
            "nom" => "Cerien"
        ]);
    }
    #[Route("/test/calcul", name: "app_test_calcul")]

    public function calcul()
    {
        $a = 10;
        $b = 12;
        $resultat = $a + $b;
        return $this->render("test/calcul.html.twig", [
            "a" => $a,
            "b" => $b,
            "resultat" => $resultat,
        ]);
    }

    #[Route("/test/calcul/{a}/{b?}", name: "app_test_calcul_dynamique", requirements:["a"=>"\d+", "b"=>"[0-9]+"])]
        #La partie du chemin qui se trouve entre {} est dynamique. Elle peut etre remplacée par n'imprte quelle chaine de caractères.

        #REGEX : EXpression REGulière
        #\d         : n'importe quel chiffre 
        ##[0-9]     : n'imorte quel caractere entre 0 et 9
        ##[.]       : le caractere . (virgule)
        ##?         : le caractere précédent peut etre présent 0 ou 1 fois
        #+          :le caractere précedent doit etre au moins 1 fois
        #*          :le caractere précedent peut etre 0 ou n fois
        #.          : n'importe quel caractere

        #Pour pouvoir utilsier ces valeurs passées dans l'URL, il faur déclarer des argement dans la fonction c a l c u l D y n a m i q u e qui auront le meme nom

    public function calculDynamique($a, $b)
    {
        return $this->render("test/calcul.html.twig", [
            "a" => $a,
            "b" => $b,
        ]);
    }
    #[Route('/test/tableau', name: 'app_test_tableau')]
    public function tableau()
    {
        $array = [5, 10, "bonjour", "je m'appelle", true, 445, 789];
        return $this->render("test/tableau.html.twig", ["tableau" => $array]);
    }
    #[Route('/test/tableau-associatif')]
        public function tableauAssociatif()
        {
            $p = ["nom" => "Cérien", "prenom" => "jean"];
            return $this->render("test/assoc.html.twig", ["var" => $p]);
        }
        #[Route('/test/objet')]
        public function objet()
        {
            $objet = new \stdClass;
            $objet->nom = "Odin";
            $objet->prenom = "Anne";
            return $this->render("test/assoc.html.twig");
            
        }
        #[Route('/test/condition/{age}')]
        public function condition($age)
        {
            return $this->render("test/condition.html.twig", ["age" => $age]);
        }
}
