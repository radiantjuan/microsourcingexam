<?PHP
App::uses('AppController', 'Controller');

class HomeController extends AppController {
    public $components = array('RequestHandler',
        'Security' => array(
                'csrfExpires' => '+1 hour',
                'unlockedActions' => array(
                    'search_post',
                    'edit_post'
                )
            )
        );

	public function index(){
		$json = file_get_contents('http://devel2.ordermate.online/wp-json/wp/v2/posts?_embed');
		$array = json_decode($json);
		$this->set('data',$array);
	}

	public function get_post(){
		$json = file_get_contents('http://devel2.ordermate.online/wp-json/wp/v2/posts/'.$this->request->params['postid'].'?_embed');
		$array = json_decode($json);
		$this->set('data',$array);
	}

	public function search_post(){
		if($this->request->is('post')){
			if(isset($this->request->data['advancesearch'])){
				$from = strtotime($this->request->data['from']);
				$to = strtotime($this->request->data['to']);
				$json = file_get_contents('http://devel2.ordermate.online/wp-json/wp/v2/posts?_embed&search='.urlencode($this->request->data['query']).'&orderby=date&order=desc&after='.urlencode(date('Y-m-d',$from)).'T00:00:00&before='.urlencode(date('Y-m-d',$to).'T23:59:59'));
			}else{
				$json = file_get_contents('http://devel2.ordermate.online/wp-json/wp/v2/posts?_embed&search='.urlencode($this->request->data['query']).'&orderby=date&order=desc');
			}

			$array = json_decode($json);
			$this->set('data',$array);
		}
	}

	public function edit_post(){
		if($this->request->is('post')){
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_USERPWD, "test:4WB@mgar$#DVq8&%sBt(rj!5");
			curl_setopt($curl, CURLOPT_URL, 'http://devel2.ordermate.online/wp-json/wp/v2/posts/'.$this->request->params['postid'].'?password=4WB@mgar$#DVq8&%sBt(rj!5&title='.urlencode($this->request->data['title']).'&content='.urlencode($this->request->data['blog-content']));
			$result = curl_exec($curl);
		}else{
			$json = file_get_contents('http://devel2.ordermate.online/wp-json/wp/v2/posts/'.$this->request->params['postid'].'?_embed');
			$array = json_decode($json);
			$this->set('data',$array);
		}
	}

}