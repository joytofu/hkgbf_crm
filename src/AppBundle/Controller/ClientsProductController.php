<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-8-31
 * Time: 9:02
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use AppBundle\Entity\Statement;
use AppBundle\Form\InsuranceType;
use AppBundle\Form\StatementType;
use AppBundle\Form\StockType;
use AppBundle\Form\ToDoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Entity\Fund;
use AppBundle\Entity\Insurance;
use AppBundle\Entity\Stock;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use PHPExcel_IOFactory;

/**
 * @Route("/admin")
 */
class ClientsProductController extends Controller
{
    /**
     * 客户产品详情
     * @Route("/product_detail/{id}", name="productdetail")
     * @Method({"GET","POST"})
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function product_detail($id, Client $client){
        $agent = $this->getUser();

        //get stock data of user
        $stock_data = $client->getStocks();
        $sum = 0;
        foreach($stock_data as $value){
            $sum+=$value->calculateProfitAndLoss();
        }

        //get insurance data of user
        $insurance_data = $client->getInsurances();

        //get name of current user
        $client_name = $client->getName();

        //create upload form
        $upload_form = $this->createUploadForm('productFile',$client,'upload_data');

        //create upload statement form
        $statement = new Statement();
        $statement_form = $this->createForm(new StatementType($statement));

        //get current statements
        $statements = $client->getStatements();

        return $this->render('FOSUserBundle:Clients:products_detail.html.twig',array(
            'agent'=>$agent,
            'client_data'=>$client,
            'stock_data'=>$stock_data,
            'insurance_data'=>$insurance_data,
            'client_name'=>$client_name,
            'sum'=>$sum,
            'user_id'=>$id,
            'statements'=>$statements,
            'upload_form'=>$upload_form->createView(),
            'statement_form'=>$statement_form->createView()));
    }

    /**
     * 客户产品资料上传
     * @Route("/product_upload/{id}", name="upload_data")
     * @ParamConverter("client", class="AppBundle:Client")
     * @Method({"GET","POST"})
     */
    public function uploadProductFile(Client $client,Request $request){
        $url="upload_data";
        $form = $this->createUploadForm('productFile',$client,$url);
        $form->handleRequest($request);
        $file = $form['productFile']->getData();


        if($form->isSubmitted()) {
            $data = $this->handleExcelData($file);
            /*$filename = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $ext_arr = array('xlsx','xls');

            //判断上传的文件类型是否合法
            if(!in_array($ext,$ext_arr)){
                return new Response("<script>alert('非法文件类型!')</script>");
            }

            $rootdir = $this->get('kernel')->getRootDir();
            $destination = $rootdir. "/../web/product/upload";
            $file->move($destination,$filename); //移动上传文件到指定路径

            require $rootdir . "/../bundles/PHPExcel/PHPExcel/IOFactory.php";//载入PHPExcel类文件
            $filename2 = $rootdir . "/../web/product/upload/".$filename; //上传后文件绝对路径
            $fileType = PHPExcel_IOFactory::identify($filename2);//自动获取文件的类型提供给phpexcel用
            $objReader = PHPExcel_IOFactory::createReader($fileType);//获取文件读取操作对象
            $objPHPExcel = $objReader->load($filename2);//加载文件
            $excel_data = $objPHPExcel->getSheet(0)->toArray();//读取第1个sheet里的数据 全部放入到数组中
            $dataNum = count($excel_data);*/

            //判断上传的文件名，选择对应资料写入器
            if(strstr($data['filename'],'stock')){
                $this->upload_stock_data($client,$data['dataNum'],$data['excel_data']);
            }elseif(strstr($data['filename'],'insurance')){
                $this->upload_insurance_data($client,$data['dataNum'],$data['excel_data']);
            }elseif(strstr($data['filename'],'fund')){
                $this->upload_fund_data($client,$data['dataNum'],$data['excel_data']);
            }else{
                return new Response("<script>alert('非法文件名!')</script>");
            }

        }
        $content = "<script>alert('上传成功!')</script>";
        $response = new Response();
        $response->setContent($content);
        return $this->redirectToRoute('clientslist');
    }


    /**
     * 股票资料写入器
     * @param User $user
     */
    public function upload_stock_data(User $user, $dataNum,$excel_data){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Stock')->findAll();
        $stockNames = array();
        foreach($data as $data_obj){
            $stockNames[] = $data_obj->getStockName();
        }
        for($i=1;$i < $dataNum; $i++){
            if(in_array($excel_data[$i][1],$stockNames)){
              $stock_obj =  $em->getRepository('AppBundle:Stock')->findBy(array('stock_name'=>$excel_data[$i][1]));
                $stock_obj[0]->setStockId($excel_data[$i][0]);
                $stock_obj[0]->setStockName($excel_data[$i][1]);
                $stock_obj[0]->setBuyDate(new \DateTime($excel_data[$i][2]));
                $stock_obj[0]->setPosition($excel_data[$i][3]);
                $stock_obj[0]->setBuyingPrice($excel_data[$i][4]);
                $stock_obj[0]->setCurrentPrice($excel_data[$i][5]);
                $stock_obj[0]->setNote($excel_data[$i][6]);
                $stock_obj[0]->setUser($user);
                $em->flush();
            }else{
                $stock_obj = new Stock();
                $stock_obj->setStockId($excel_data[$i][0]);
                $stock_obj->setStockName($excel_data[$i][1]);
                $stock_obj->setBuyDate(new \DateTime($excel_data[$i][2]));
                $stock_obj->setPosition($excel_data[$i][3]);
                $stock_obj->setBuyingPrice($excel_data[$i][4]);
                $stock_obj->setCurrentPrice($excel_data[$i][5]);
                $stock_obj->setNote($excel_data[$i][6]);
                $stock_obj->setUser($user);
                $em->persist($stock_obj);
                $em->flush();
            }
        }

    }


    /**
     * 保险资料写入器
     */
    protected function upload_insurance_data(User $user, $dataNum,$excel_data){
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Insurance')->findAll();
        $insuranceNames = array();
        foreach($data as $data_obj){
            $insuranceNames[] = $data_obj->getInsuranceName();
        }
        for($i=1;$i < $dataNum; $i++){
            if(in_array($excel_data[$i][0],$insuranceNames)){
                $insurance_obj =  $em->getRepository('AppBundle:Insurance')->findBy(array('insurance_name'=>$excel_data[$i][0]));
                $insurance_obj[0]->setInsuranceName($excel_data[$i][0]);
                $insurance_obj[0]->setType($excel_data[$i][1]);
                $insurance_obj[0]->setInsurancePremium($excel_data[$i][2]);
                $insurance_obj[0]->setSumInsured($excel_data[$i][3]);
                $insurance_obj[0]->setPolicyHolder($excel_data[$i][4]);
                $insurance_obj[0]->setRecognizee($excel_data[$i][5]);
                $insurance_obj[0]->setAgeAtIssue($excel_data[$i][6]);
                $insurance_obj[0]->setYears($excel_data[$i][7]);
                $insurance_obj[0]->setBornDate(new \DateTime($excel_data[$i][8]));
                $insurance_obj[0]->setGender($excel_data[$i][9]);
                $insurance_obj[0]->setIsSmoking($excel_data[$i][10]);
                $insurance_obj[0]->setBuyDate(new \DateTime($excel_data[$i][11]));
                $insurance_obj[0]->setNextPayDate(new \DateTime($excel_data[$i][12]));
                $insurance_obj[0]->setUser($user);
                $em->flush();
            }else{
                $insurance_obj = new Insurance();
                $insurance_obj->setInsuranceName($excel_data[$i][0]);
                $insurance_obj->setType($excel_data[$i][1]);
                $insurance_obj->setInsurancePremium($excel_data[$i][2]);
                $insurance_obj->setSumInsured($excel_data[$i][3]);
                $insurance_obj->setPolicyHolder($excel_data[$i][4]);
                $insurance_obj->setRecognizee($excel_data[$i][5]);
                $insurance_obj->setAgeAtIssue($excel_data[$i][6]);
                $insurance_obj->setYears($excel_data[$i][7]);
                $insurance_obj->setBornDate(new \DateTime($excel_data[$i][8]));
                $insurance_obj->setGender($excel_data[$i][9]);
                $insurance_obj->setIsSmoking($excel_data[$i][10]);
                $insurance_obj->setBuyDate(new \DateTime($excel_data[$i][11]));
                $insurance_obj->setNextPayDate(new \DateTime($excel_data[$i][12]));
                $insurance_obj->setUser($user);
                $em->persist($insurance_obj);
                $em->flush();
            }
        }
    }


    protected function handleExcelData($file){
        $filename = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $new_filename = md5(uniqid(mt_rand(),7)).".".$ext;
        $ext_arr = array('xlsx','xls','csv');

        //判断上传的文件类型是否合法
        if(!in_array($ext,$ext_arr)){
            return new Response("<script>alert('非法文件类型!')</script>");
        }

        $rootdir = $this->get('kernel')->getRootDir();
        $destination = $rootdir. "/../web/product/upload";
        $file->move($destination,$new_filename); //移动上传文件到指定路径

        require $rootdir . "/../bundles/PHPExcel/PHPExcel/IOFactory.php";//载入PHPExcel类文件
        $filename2 = $rootdir . "/../web/product/upload/".$new_filename; //上传后文件绝对路径
        $fileType = PHPExcel_IOFactory::identify($filename2);//自动获取文件的类型提供给phpexcel用
        $objReader = PHPExcel_IOFactory::createReader($fileType);//获取文件读取操作对象
        $objPHPExcel = $objReader->load($filename2);//加载文件
        $excel_data = $objPHPExcel->getSheet(0)->toArray();//读取第1个sheet里的数据 全部放入到数组中
        $dataNum = count($excel_data);
        $data = array('filename'=>$filename,'excel_data'=>$excel_data,'dataNum'=>$dataNum);
        return $data;
    }

    /**
     * 环球基金资料写入器
     */
    protected function upload_fund_data(){

    }

    protected function createUploadForm($field,$entity_object,$url){
        return $this->createFormBuilder($entity_object)
            ->add($field,'vich_file',array('label'=>"上传文件"))
            ->setAction($this->generateUrl($url,array('id'=>$entity_object->getId())))
            ->setMethod('POST')
            ->getForm();
    }


    /**
     * @Route("/addstocks/{id}",name="addstocks")
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function addStocks(Client $client,Request $request,$id){

        $stock = new Stock();

        $form = $this->createForm(new StockType(),$stock);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if($form->isSubmitted()&&$form->isValid()){
            $stock->setClient($client);
            $em->persist($stock);
            $em->flush();

           return $this->redirectToRoute('productdetail',array('id'=>$id));
        }

        return $this->render('@FOSUser/Clients/add_stocks.html.twig',array('form'=>$form->createView()));
    }

    /**
     * @Route("/addinsurance/{id}", name="addinsurance")
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function addInsurance(Client $client,Request $request,$id){
        $insurance = new Insurance();
        $form = $this->createForm(new InsuranceType(),$insurance);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if($form->isSubmitted()&&$form->isValid()){
            $insurance->setClient($client);
            $em->persist($insurance);
            $em->flush();

            return $this->redirectToRoute('productdetail',array('id'=>$id));
        }

        return $this->render('@FOSUser/Clients/add_insurance.html.twig',array('form'=>$form->createView(),'id'=>$id));
    }


    /**
     * @Route("/edit_stock/{id}",name="editstock")
     * @Method({"GET","POST"})
     * @ParamConverter("stock", class="AppBundle:Stock")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editStock(Stock $stock,Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $client_id = $stock->getClient()->getId();


        $form = $this->createForm(new StockType(),$stock);
        $delete_form = $this->createDeleteForm($stock,'deletestock');

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
            return new Response("<script>alert('修改成功!')</script>");
        }

        return $this->render('@FOSUser/Clients/edit_stock.html.twig',array(
            'form'=>$form->createView(),
            'id'=>$id,
            'client_id'=>$client_id,
            'delete_form'=>$delete_form->createView()));
    }


    /**
     * @Route("/edit_insurance/{id}", name="editinsurance")
     * @Method({"GET","POST"})
     * @ParamConverter("insurance", class="AppBundle:Insurance")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editInsurance(Insurance $insurance, Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $client_id = $insurance->getClient()->getId();


        $form = $this->createForm(new InsuranceType(),$insurance);
        $delete_form = $this->createDeleteForm($insurance,'deleteinsurance');

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
            return new Response("<script>alert('修改成功!');window.location.href='/admin/clientslist';</script>");
        }

        return $this->render('@FOSUser/Clients/edit_insurance.html.twig',array(
            'form'=>$form->createView(),
            'id'=>$id,
            'client_id'=>$client_id,
            'delete_form'=>$delete_form->createView()));
    }

    /**
     * delete stock entity on the inside of edit form
     * @Route("/delete_stock/{id}", name="deletestock")
     * @ParamConverter("stock", class="AppBundle:Stock")
     */
    public function deleteStock(Stock $stock, Request $request){
        $client_id = $stock->getClient()->getId();

        $form = $this->createDeleteForm($stock,'deletestock');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stock);
            $em->flush();
        }

        return $this->redirectToRoute('productdetail',array('id'=>$client_id));
    }

    /**
     * delete insurance entity on the inside of edit form
     * @Route("/delete_insurance/{id}", name="deleteinsurance")
     * @ParamConverter("insurance", class="AppBundle:Insurance")
     */
    public function deleteInsurance(Insurance $insurance, Request $request){
        $client_id = $insurance->getClient()->getId();

        $form = $this->createDeleteForm($insurance,'deleteinsurance');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($insurance);
            $em->flush();
        }
        return $this->redirectToRoute('productdetail',array('id'=>$client_id));
    }


    /**
     * delete stock entity from the product detail table
     * @Route("/delete_stock_2/{id}",name="deletestock2")
     * @ParamConverter("stock", class="AppBundle:Stock")
     */
    public function delete_stock_2(Stock $stock){
        $client_id = $stock->getClient()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->remove($stock);
        $em->flush();
        echo "<script>alert('删除成功!')</script>";

        return $this->redirectToRoute('productdetail',array('id'=>$client_id));
    }


    /**
     * delete insurance entity from the product detail table
     * @Route("/delete_insurance_2/{id}",name="deleteinsurance2")
     * @ParamConverter("insurance", class="AppBundle:Insurance")
     */
    public function delete_insurance_2(Insurance $insurance){
        $client_id = $insurance->getClient()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->remove($insurance);
        $em->flush();
        echo "<script>alert('删除成功!')</script>";

        return $this->redirectToRoute('productdetail',array('id'=>$client_id));
    }

    /**
     * @Route("/delete_client/{id}", name="deleteclient")
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function deleteClient(Client $client){
        $em = $this->getDoctrine()->getManager();
        $em->remove($client);
        $em->flush();

        return $this->redirectToRoute('group');
    }



    private function createDeleteForm($object_entity,$gUrl)
    {

        return $this->createFormBuilder()
            ->setAction($this->generateUrl($gUrl, array('id' => $object_entity->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    /**
     * handle statement data
     * @Route("/upload_statement/{id}",name="upload_statement")
     * @ParamConverter("client", class="AppBundle:Client")
     * @Method({"GET","POST"})
     */
    public function upload_statement(Client $client,Request $request,$id){
        $em = $this->getDoctrine()->getManager();
        $statement = new Statement();
        $form = $this->createForm(new StatementType($statement));
        $form->handleRequest($request);
        $file = $form['statement_file']->getData();
        if($form->isSubmitted()) {
            $data = $this->handleExcelData($file);
            $content = array_splice($data['excel_data'],1);
            $tr_arr = array();
            foreach($content as $value){
                $td_arr = array();
                foreach($value as $td){
                    $td_arr[] = '<td>'.$td.'</td>';
                }
                $tds = implode("",$td_arr);
                $tdss = '<tr>'.$tds.'</tr>';
                $tr_arr[] = $tdss;
            }
            $content = implode("",$tr_arr);
            $statement->setContent($content);
            $statement->setClient($client);
            $em->persist($statement);
            $em->flush();

        }
        $baseurl = $this->getRequest()->getBaseUrl();
        $redirect_url = $baseurl."/admin/product_detail/".$id;
        return new Response("<script>alert('添加日结单成功!');window.location.href='$redirect_url';</script>");
    }

    /**
     * @Route("/edit_statement/{id}",name="edit_statement")
     * @ParamConverter("statement", class="AppBundle:Statement")
     * @Method({"GET","POST"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit_statement(Statement $statement,Request $request){
        $em = $this->getDoctrine()->getManager();
        $client_id = $statement->getClient()->getId();
        $form = $this->createForm(new StatementType($statement));
        $form->handleRequest($request);
        $file = $form['statement_file']->getData();
        if($form->isSubmitted()) {
            $data = $this->handleExcelData($file);
            $content = array_splice($data['excel_data'],1);
            $tr_arr = array();
            foreach($content as $value){
                $td_arr = array();
                foreach($value as $td){
                    $td_arr[] = '<td>'.$td.'</td>';
                }
                $tds = implode("",$td_arr);
                $tdss = '<tr>'.$tds.'</tr>';
                $tr_arr[] = $tdss;
            }
            $content = implode("",$tr_arr);
            $statement->setContent($content);
            $em->flush();
        }
        $baseurl = $this->getRequest()->getBaseUrl();
        $redirect_url = $baseurl."/admin/product_detail/".$client_id;
        return new Response("<script>alert('修改日结单成功!');window.location.href='$redirect_url';</script>");
    }

    /**
     * @Route("/statements_list",name="statements_list")
     */
    public function statements_list(){
        $user = $this->getUser();
        $client = $user->getSingleClient();
        $statements = $client->getStatements();

        return $this->render('@FOSUser/Clients/statements_list.html.twig',array('statements'=>$statements));
    }

    /**
     * @Route("/statement_detail/{id}",name="statement_detail")
     * @ParamConverter("statement", class="AppBundle:Statement")
     */
    public function statement_detail_for_client(Statement $statement){
        $client_of_statement = $statement->getClient();
        $user = $this->getUser();
        $client = $user->getSingleClient();
        $client_id = $client->getId();
        if($client_of_statement!==$client){
            $redirect_url = "/admin/client_index";
            return new Response("<script>alert('你没有权限浏览该用户数据!');window.location.href='$redirect_url'</script>");
        }
        $content = $statement->getContent();
        $updatedAt = $statement->getUpdatedAt();
        return $this->render("@FOSUser/Clients/statement_detail.html.twig",array(
            'content'=>$content,
            'updatedAt'=>$updatedAt,
            'client_id'=>$client_id));

    }

    /**
     * @Route("/stm_detail/{id}",name="stm_detail")
     * @ParamConverter("statement", class="AppBundle:Statement")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function statement_detail_for_admin(Statement $statement){
        $content = $statement->getContent();
        $updatedAt = $statement->getUpdatedAt();
        return $this->render('@FOSUser/Clients/statement_detail.html.twig',array('content'=>$content,'statement'=>$statement,'updatedAt'=>$updatedAt));
    }

    /**
     * @Route("/delete_statement/{id}",name="delete_statement")
     * @ParamConverter("statement", class="AppBundle:Statement")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete_statement(Statement $statement){
        $client_id = $statement->getClient()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->remove($statement);
        $em->flush();
        return $this->redirectToRoute('productdetail',array('id'=>$client_id));

    }

    /**
     * @Route("/stocks_detail",name="stocks_detail")
     */
    public function stocks_detail(){
        $client = $this->getUser()->getSingleClient();
        $stocks_data = $client->getStocks();
        $sum = 0;
        foreach($stocks_data as $value){
            $sum+=$value->calculateProfitAndLoss();
        }
        return $this->render("@FOSUser/Clients/stocks_detail.html.twig",array('stocks_data'=>$stocks_data,'sum'=>$sum));
    }


    /**
     * @Route("/insurances_detail",name="insurances_detail")
     */
    public function insurances_detail(){
        $client = $this->getUser()->getSingleClient();
        $insurances_data = $client->getInsurances();
        return $this->render("@FOSUser/Clients/insurances_detail.html.twig",array('insurances_data'=>$insurances_data));
    }


}