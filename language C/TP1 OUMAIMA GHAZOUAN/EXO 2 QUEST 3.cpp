#include<stdio.h>
#include<conio.h>
#include<math.h  >

int main(){


float a,b,c,delta,X1,X2;

printf("\t\t\t *************************");
printf("\n\t\t\t ** TP 1 : EXERCICE 2-4 **\n");
printf("\t\t\t *************************\n\n");

//Saisir a , b et c :

printf("Entrez a , b et c : ");
scanf("%f %f %f",&a,&b,&c);

//Traitement des données:

if(a == 0)
{
	 if(b == 0)
	 {
		  if(c == 0) printf("\tS = IR");
            else
               printf("\t Erreur ! \a \a ");
     }
     else
        printf("\tX = %.2f ",(-c/b));
}
else{
	 delta = b*b - 4 * a * c;
	 if(delta == 0) printf("\t X = %.2f",(-b/(2*a)));
	   else
		  if(delta >0) printf("\t X1 = %.2f\n\t X2 = %.2f",-(b*b + sqrt(delta) )/(2*a),(b*b - sqrt(delta) )/(2*a) );
			else
			   printf("la solution est complexe");

}




getch();

}

