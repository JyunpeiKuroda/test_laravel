<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="ja" lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>フォームのサンプル（入力画面）</title>
  <style>
  dl { width:430px; }
  dt { float:left; }
  dd { margin-left:130px; }
  .error{ color: tomato; }
  </style>
</head>
<body>
<h1>フォームサンプル（入力画面）</h1>
<p>アンケートにご協力下さい</p>

<form action="{{ route('validation.confirm') }}" method="post">
  <dl>
  <dt>名前：</dt>
  <dd>
  <input type="text" name="username" />
  @if($errors->has('username'))<br><span class="error">{{ $errors->first('username') }}</span> @endif
  </dd>
  </dl>

  <dl>
  <dt>Email：</dt>
  <dd>
  <input type="text" name="mail" />
  @if($errors->has('mail'))<br><span class="error">{{ $errors->first('mail') }}</span> @endif
  </dd>
  </dl>

  <dl>
  <dt>年齢：</dt>
  <dd>
  <input type="text" name="age" />歳
  @if($errors->has('age'))<br><span class="error">{{ $errors->first('age') }}</span> @endif
  </dd>
  </dl>

  <dl>
  <dt>ご意見ご感想：</dt>
  <dd>
  <textarea name="opinion" rows="8" cols="40"></textarea>
  @if($errors->has('opinion'))<br><span class="error">{{ $errors->first('opinion') }}</span> @endif
  </dd>

  <div><input type="submit" name="button1" value="送信" /></div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

</body>
</html>