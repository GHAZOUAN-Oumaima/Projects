#include<stdio.h>
int main()
{
     
  int T0=1;
  int T1;
  int T2;
  float x;
  int n; 
  int i;
  do
  {
  printf("entrer x ");
  scanf("f% ",&x);}
  while (x>-1 && x<1);
  T1=x;
  printf("entrer  n");
  scanf("d%",&n);
  
  for (i=0 ; i<n ; i++ )
  {
     T2=2*x*T1-T0;
     T0=T1;
     T1=T2;
     
     }  
      
  printf("Tn vaut %d",T2   );
  
  getchar();
}
     
     
     

