#include<stdio.h>
#include<conio.h>

int main()
{
	int i,j,N1,N2;
	char S1[N1],S2[N2],S3[N1+N2];
printf("S1= ");	
scanf("%s",&S1);
printf("S2=");
scanf("%s",&S2);



i=0;
while(S1[i]!='\0')	i++;
	N1=i;
j=0;
while(S2[j]!='\0') j++;
	N2=j;
	
if (N1!=N2)
	printf("S1 et S2 sont différents");
else 
	i=0;
	while(S1[i]=S2[i] && i<N1)	i++;
	if( i==N1 ) printf("S1 et S2 sont egaux");
	else printf("S1 et S2 ne sont pas egaux");
	
	
for (int i=0 ; i<N1 ;i++)
	S3[i]=S1[i];
printf("%s",S3);

for(i=N1;i<=N1+N2;i++)
   {
	  S1[i] = S2[i-N1];
   }

printf(" La chaine S1 concatenee : %s .",S1);

	
	
	
	
	
getchar();
}
