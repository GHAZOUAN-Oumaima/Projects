#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

int num_lieu, liste_objet[10]={0};

void sauvegarder_jeu(char *nom_partie){
    FILE *flot;
    //OUVERTURE FICHIER (VERIFICATION D’ERREUR)
    flot =fopen(nom_partie, "wb");
    assert(flot);
    /* ECRITURE NUMERO DU LIEU */
    fwrite (&num_lieu, sizeof(num_lieu), 1, flot);
    /* ECRITURE LISTE DES OBJETS */
    fwrite (liste_objet, sizeof(liste_objet),1, flot);
    /* FERMETURE FICHIER */
    fclose(flot);
}
void charger_jeu(char *nom_partie){
    FILE *flot;
    //vérification si le fichier contient bien les données
    int liste_objet2[10];
    int nm_lieu;
    flot = fopen(nom_partie,"rb");
    assert(flot);
    fread(&nm_lieu, sizeof(nm_lieu), 1, flot);
    printf("nm_lieu = %d\n", nm_lieu);
    size_t szoflist = fread(liste_objet2, sizeof *liste_objet2, 10, flot); // lit la liste d'objets
    if(szoflist == 10) {
        puts("Array read successfully, contents: ");
        for(int n = 0; n < 10; ++n){
            printf("%d ", liste_objet2[n]);
        }
        putchar('\n');
    } else { // error handling
       if (feof(flot))
          printf("Error reading partie.bin: unexpected end of file\n");
       else if (ferror(flot)) {
           perror("Error reading partie.bin\n");
       }
    }
    /* FERMETURE FICHIER */
    fclose(flot);
}

int main(){
    num_lieu=2;
    liste_objet[3] = 1;
    liste_objet[7] = 1;
    char name[20];
    printf("Entrer le nom de la partie:"); //partie.bin
    scanf("%s", name);
    sauvegarder_jeu(name);
    charger_jeu(name);
    return 0;
}