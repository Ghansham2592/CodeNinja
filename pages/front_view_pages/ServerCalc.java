import java.rmi.*;
import java.rmi.server.*;
public class ServerCalc extends UnicastRemoteObject implements InterCalc {
	public ServerCalc() throws RemoteException{ }
	public String operation(String sign,double val1,double val2) throws RemoteException {
		double result=0.0;
		if(sign.equals("+")) result=val1+val2;
		else if(sign.equals("-")) result=val1-val2;
		else if(sign.equals("*")) result=val1*val2;
		else if(sign.equals("/")) result=val1/val2;
		if(val2==0) return "Divide by Zero Error";
		else return result+"";
	}
	public static void main(String rups[]) {
		try {
			ServerCalc Sc=new ServerCalc();
			Naming.rebind("oper",Sc);
			System.out.println("Server Registered.");
		} catch (Exception exp) {
			exp.printStackTrace();
		}
	}
}
