#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#define Malloc(type) (type *)malloc(sizeof(type))


// Structure de donnees
typedef struct donnee
{
    int domaine;
    char nom[20], ville[15], code[3];
}donnee;

// element de la liste chainee
typedef struct adherant
{
    donnee *infos ;
    struct adherant *next ;
}adherant;



void menu_1()
{
    int option;
    printf("\t 1. Inserer .\n");
    printf("\t 2. Afficher .\n");
    printf("\t 3. Afficher en fonction de la ville donnee. \n");
    printf("\t 4. Rechercher .\n");
    printf("\t 5. Supprimer . \n");
    printf("\n Donner votre choix : ");
}


void menu_2()
{
    printf("\t\t 1. Insertion en debut. \n");
    printf("\t\t 2. Insertion en ordre alphabetique. \n");
    printf("\t\t 3. Insertion a la fin. \n ");
    printf("\n\t Votre choix : ");
}


donnee *creerAdherant()
{
    donnee *d = Malloc(donnee);

    if(d == NULL)
        exit(0);

    printf(" \n Saisissez les informations suivantes : \n");
    printf(" - VOTRE Code : ");      
	 scanf("%s",d->code);
    printf(" - VOTRE Nom : ");      
	  scanf("%s",d->nom);
    printf(" - VOTRE Ville : ");    
	  scanf("%s",d->ville);
    printf(" - VOTRE Domaine : ");  
	  scanf("%d",&d->domaine);
    printf(" \n Vous voulez : \n ");
    return d;
}


adherant *inserer_adherant(adherant *first , int option , donnee *d)
{
    adherant * nouveau = Malloc(adherant);
    if(nouveau == NULL)
        exit(0);

    nouveau->infos = d ;
    adherant *p  ;

    switch(option)
    {
        case 1: 
            nouveau->next = first ;
            first = nouveau ;
            printf(" \n succes  \n");
            break;

        case 2: 
            p = first ;
            if(p == NULL || strcmp(nouveau->infos->nom , p->infos->nom ) <= 0)
            {
                nouveau->next = p ;
                first = nouveau ;
            }
            else
            {
                while( p->next != NULL && strcmp(nouveau->infos->nom , p->next->infos->nom) > 0)
                    p = p->next;

                nouveau->next = p->next ;
                p->next = nouveau ;
            }
            printf(" \n  succes \n");
            break;

        case 3: 
            if(first == NULL) 
            {
                first = nouveau ;
                nouveau->next = NULL ;
            }
            p = first ;
            while(p->next!=NULL)
                p = p->next ;
            p->next = nouveau ;
            nouveau->next = NULL ;
            printf(" \n succes  \n");
            break;

        default:
            printf(" \n Choix incorrect !! \n");
            break;
    }
    return first ;
}


void afficher_adherant(adherant *info)
{
    adherant *p = info ;
    int i=1;
    if(info==NULL)
        printf("\n Votre liste est vide, vous devez inserer des adherants !! \n ");

    else
    {
        printf("\n \t\t Nom \t\t\t Code \t\t Ville \t\t Domaine \n\n");
        while(p!=NULL)
        {
            printf("Adherant %d \t %s \t\t\t %s \t\t %s \t\t %d \n",i++,p->infos->nom,p->infos->code,p->infos->ville,p->infos->domaine);
            p = p->next;
        }
    }
}


void afficher_adherant_ville(adherant *Liste )
{
    adherant *p = Liste ;
    char Ville[15] ;
    int i=1 ;

    if(!p)
    {
        printf(" \n Votre liste est vide !! Vous devez inserer des adherants !!\n ");
    }
    else
    {
        printf(" \n Donner le nom de la ville : ");
        scanf("%s",Ville);

        printf("\n \t\t Nom \t\t\t Code \t\t\t Domaine \n\n");
        while(p!=NULL )
        {
            if(strcmp(Ville , p->infos->ville)== 0)
                printf("Adherant %d \t %s \t\t\t %s  \t\t\t %d \n",i++,p->infos->nom,p->infos->code,p->infos->domaine);
            p = p->next;
        }
    }
}


void chercher_adherant(adherant *Liste)
{
    adherant *p = Liste ;
    int option ;
    char Nom[20] , Code[3] ;

    if(!p)
    {
        printf(" \n Votre liste est vide !! Vous devez inserer des adherants !! \n");
    }
    else
    {
        printf("\n \t 1. Chercher par nom. \n \t 2. Chercher par code. \n");
        printf(" \n \t Vous voulez : ");
        scanf("%d",&option);
        switch(option)
        {
        case 1:
                printf(" \n Veuillez saisir le nom : ");
                scanf("%s",Nom);
                while(p && strcmp(Nom , p->infos->nom) != 0)
                    p = p->next ;
                break ;

        case 2:
            printf(" \n Veuillez saisir le code : ");
                scanf("%s",Code);
                while(p && strcmp(Code , p->infos->code) != 0)
                    p = p->next ;
                break ;

        default:
                printf(" \n Le choix incorrect !! \n");
                break ;
        }
         if(p)
                {
                    printf("\n \t Votre adherant est : \n");
                    printf("\n Le nom   : %s \t",p->infos->nom);
                    printf(" La ville   : %s \t",p->infos->ville );
                    printf(" Le code    : %s \t",p->infos->code);
                    printf(" Le domaine : %d ",p->infos->domaine);
                }
                else
                {
                    printf(" \n Le nom ou le code saisie n existe pas \n");
                }
    }
}


adherant *supprimer_adherant(adherant *Liste)
{
    adherant *p = Liste ;
    if(!p)
    {
        printf(" \n La liste est vide !! Rien a supprimer !! \n");
    }
    else
    {
        char c[3] ;
        printf(" \n Donner le code de l element a supprimer : ");
        scanf("%s",c);

        if(strcmp(c,p->infos->code) == 0)
           {
                Liste = p->next ;
                free(p);
                printf(" \n La supprission est faite par succes !! \n");
           }
           else
           {
               while(p->next && (strcmp(c,p->next->infos->code)!=0))
            {
                p = p->next ;
            }
        if(p->next)
        {
            adherant *q = p->next ;
            p->next = p->next->next ;
            free(q) ;
            printf(" \n La supprission est faite par succes !! \n");
        }
        else
            printf("\n Le code saisie n exite pas !! \n");
    }
           }


    return Liste ;
}

int main()
{
    int choix , continu = 1 , choix_insertion ;
    adherant *liste = NULL  ;
    donnee *data ;

    
    while(continu)
    {
        menu_1();
        scanf("%d",&choix);
        switch(choix)
        {
            case 1:
                printf("\n Insertion d'un adherant : \n");
                data = creerAdherant();
                menu_2();
                scanf("%d",&choix_insertion);
                liste = inserer_adherant(liste , choix_insertion , data);
                break;

            case 2:
                printf("\nAffichage des adherants : \n");
                afficher_adherant(liste);
                break;

            case 3:
                printf("\nAffichage des adherants selon la ville donnee : \n");
                afficher_adherant_ville(liste);
                break;

            case 4:
                printf(" \n Rechereche d un adheant : \n");
                chercher_adherant(liste);
                break;

            case 5:
                printf("\n  Suppression d un adherant : \n");
                liste = supprimer_adherant(liste);
                break;

            default:
                printf("\n   incorrecte \n");
        }
        printf("\n\n Cliquer sur 1 pour revenir au menu principal et 0 pour quitter : ");
        scanf("%d",&continu);
    }
    return 0;
}
