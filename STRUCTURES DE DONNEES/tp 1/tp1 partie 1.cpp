#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#define Malloc(type) (type *)malloc(sizeof(type))



typedef struct donnee
{
    int domaine;
    char nom[20], ville[15], code[3];
}donnee;


typedef struct adherant
{
    donnee *infos ;
    struct adherant *next ;
}adherant;



void menu_1()
{
    int option;
    
    printf("\t 1. Inserer.\n");
    printf("\t 2. Afficher. \n");
    printf("\t 3. Supprimer.  \n");
    printf("\t 4. Quitter. \n");
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

    printf(" \n  saisissez les informations suivantes : \n");
    printf(" - VOTRE Code : ");    
	   scanf("%s",d->code);
    printf(" - VOTRE Nom : ");    
	    scanf("%s",d->nom);
    printf(" - VOTRE Ville : ");   
	   scanf("%s",d->ville);
    printf(" - VOTRE Domaine : "); 
	   scanf("%d",&d->domaine);
    
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
            printf(" \n succesful insertion \n");
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
            printf(" \n succesful insertion  \n");
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
            printf(" \n succesful insertion  \n");
            break;

        default:
            printf(" \n  incorrect  \n");
            break;
    }
    return first ;
}


void afficher_adherant(adherant *info)
{
    adherant *p = info ;
    int i=1;
    if(info==NULL)
        printf("\n liste vide \n ");

    else
    {
        printf("\n \t\t Nom \t\t\t Code \t\t Ville \t\t Domaine \n\n");
        while(p!=NULL)
        {
        	if (p->infos->ville=="rabat"){
        		printf("Adherant %d \t %s \t\t\t %s \t\t %s \t\t %d \n",i++,p->infos->nom,p->infos->code,p->infos->ville,p->infos->domaine);
                p = p->next;
        	}
            
        }
    }
}






adherant *supprimer_adherant(adherant *Liste)
{
    adherant *p = Liste ;
    if(!p)
    {
        printf(" \n La liste est vide  \n");
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
                printf(" \n  succes  \n");
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
            printf(" \n succes  \n");
        }
        else
            printf("\n Le code saisie n exite pas !! \n");
    }
           }


    return Liste ;
}

int Quitter()

{
	int choice;
	printf("\n Cliquer sur 1 pour continuer et 4 pour quitter : ");
    scanf("%d",&choice);
    return choice;
}

int main()
{
    int choice , continu = 1 , choice_insertion ;
    adherant *liste = NULL  ;
    donnee *data ;

    
    while(continu==1)
    {
        menu_1();
        printf("votre choix");
        scanf("%d",&choice);
        switch(choice)
        {
            case 1:
                printf("\n\t  Insertion d'un adherant : \n");
                data = creerAdherant();
                menu_2();
                scanf("%d",&choice_insertion);
                liste = inserer_adherant(liste , choice_insertion , data);
                break;

            case 2:
                printf("\n\t  Affichage des adherants de rabat: \n");
                afficher_adherant(liste);
                break;

            

            

            case 3:
                printf("\n \t  Suppression d un adherant : \n");
                liste = supprimer_adherant(liste);
                break;
                
            case 4:
                printf("\n\t  Quitter: \n");
                Quitter();
                break;

            default:
                printf("\n \t  incorrecte  \n");
        }
        printf("\n Cliquer sur 1 pour continuer et 0pour quitter : ");
        scanf("%d",&continu);
    }
    return 0;
}
