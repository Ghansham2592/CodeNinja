import java.rmi.*;
import java.rmi.server.*;
public interface InterCalc extends Remote {
public String operation(String sign,double val1,double val2) throws RemoteException;
}
