<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Merito;
use App\Item;
use App\Subitem;
use App\Detalle;
use App\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificadoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function showCertificadosPerPostulation($postulation_id)
    {
        $postulation = Postulation::find($postulation_id);
        return view('certificados.perPostulation', compact('postulation'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (isset($request->merito_id)) {
            $merito = Merito::find($request->merito_id);
            $convocatoria = $merito->convocatoria;
            $postulation = Postulation::where('user_id','=',$user->id)->where('convocatoria_id','=',$convocatoria->id)->firstOrFail();
            $archivos = $postulation->archivos->count();
            $documentos = $convocatoria->documentos->where('importancia','=','Obligatorio')->count();
            if ($documentos == $archivos) {
                $certificados = Certificado::where('merito_id', '=', $merito->id)
                    ->where('postulation_id', '=', $postulation->id)->get();
                $certificado = new Certificado();
                $certificado->name=$request->input('name');
                $certificado->merito_id=$request->input('merito_id');
                $certificado->item_id=$request->input('item_id');
                $certificado->subitem_id=$request->input('subitem_id');
                $certificado->detalle_id=$request->input('detalle_id');
                $certificado->postulation_id=$postulation->id;

                if($certificados->count() === 0) {
                    $certificado->puntos = $merito->puntos;
                    $postulation->puntaje_certificados += $merito->puntos;
                    $postulation->save();
                }

                if($request->file('file')){
                    $path = Storage::disk('public')->put('meritos',  $request->file('file'));
                    $certificado->fill(['file' => asset($path)])->save();
                }
                $certificado->save();
                $postulation->save();

                return back()->with('confirmacion','Merito subido Correctamente');
            } else {
                return back()->with('negacion','Primero debe subir los documentos obligatorios');
            }
        }
        else {
            if (isset($request->item_id)) {
                $item = Item::find($request->item_id);
                $merito = $item->merito;
                $convocatoria = $merito->convocatoria;
                $postulation = Postulation::where('user_id','=',$user->id)->where('convocatoria_id','=',$convocatoria->id)->firstOrFail();
                $archivos = $postulation->archivos->count();
                $documentos = $convocatoria->documentos->where('importancia','=','Obligatorio')->count();
                if ($documentos == $archivos) {
                    $certificado = new Certificado();
                    $certificados = Certificado::where('item_id', '=', $item->id)
                        ->where('postulation_id', '=', $postulation->id)->get();
                    $certificado->name=$request->input('name');
                    $certificado->merito_id=$request->input('merito_id');
                    $certificado->item_id=$request->input('item_id');
                    $certificado->subitem_id=$request->input('subitem_id');
                    $certificado->detalle_id=$request->input('detalle_id');
                    $certificado->postulation_id=$postulation->id;

                    $puntajeItems = 0;

                    foreach($merito->items as $item1) {
                        $puntajeItems += $item1->certificados->where('postulation_id', $postulation->id)->sum('puntos');
                    }

                    if(($puntajeItems + $item->puntos) <= $merito->puntos) {
                        $certificado->puntos = $item->puntos;
                        $postulation->puntaje_certificados += $item->puntos;
                        $postulation->save();
                    } else if(($merito->puntos - $puntajeItems) < $item->puntos) {
                        $certificado->puntos = $merito->puntos - $puntajeItems;
                        $postulation->puntaje_certificados += $merito->puntos - $puntajeItems;
                        $postulation->save();
                    }

                    if($request->file('file')){
                        $path = Storage::disk('public')->put('meritos',  $request->file('file'));
                        $certificado->fill(['file' => asset($path)])->save();
                    }
                    $certificado->save();

                    return back()->with('confirmacion','Item subido Correctamente');
                } else {
                    return back()->with('negacion','Primero debe subir los documentos obligatorios');
                }
            }
            else {
                if (isset($request->subitem_id)) {
                    $subitem = Subitem::find($request->subitem_id);
                    $item = $subitem->item;
                    $merito = $item->merito;
                    $convocatoria = $merito->convocatoria;
                    $postulation = Postulation::where('user_id','=',$user->id)->where('convocatoria_id','=',$convocatoria->id)->firstOrFail();
                    $archivos = $postulation->archivos->count();
                    $documentos = $convocatoria->documentos->where('importancia','=','Obligatorio')->count();
                    if ($documentos == $archivos) {
                        $certificado = new Certificado();
                        $certificados = Certificado::where('subitem_id', '=', $subitem->id)
                            ->where('postulation_id', '=', $postulation->id)->get();
                        $certificado->name=$request->input('name');
                        $certificado->merito_id=$request->input('merito_id');
                        $certificado->item_id=$request->input('item_id');
                        $certificado->subitem_id=$request->input('subitem_id');
                        $certificado->detalle_id=$request->input('detalle_id');
                        $certificado->postulation_id=$postulation->id;

                        $puntajeSubItems = 0;

                        foreach($item->subitems as $subitem1) {
                            $puntajeSubItems += $subitem1->certificados->where('postulation_id', $postulation->id)->sum('puntos');
                        }

                        if(($puntajeSubItems + $subitem->puntos) <= $item->puntos) {
                            $certificado->puntos = $subitem->puntos;
                            $postulation->puntaje_certificados += $subitem->puntos;
                            $postulation->save();
                        } else if(($item->puntos - $puntajeSubItems) < $subitem->puntos) {
                            $certificado->puntos = $item->puntos - $puntajeSubItems;
                            $postulation->puntaje_certificados += $item->puntos - $puntajeSubItems;
                            $postulation->save();
                        }

                        if($request->file('file')){
                            $path = Storage::disk('public')->put('meritos',  $request->file('file'));
                            $certificado->fill(['file' => asset($path)])->save();
                        }
                        $certificado->save();

                        return back()->with('confirmacion','Subitem subido Correctamente');
                    } else {
                        return back()->with('negacion','Primero debe subir los documentos obligatorios');
                    }
                }
                else {
                    if (isset($request->detalle_id)) {
                        $detalle = Detalle::find($request->detalle_id);
                        $subitem = $detalle->subitem;
                        $item = $subitem->item;
                        $merito = $item->merito;
                        $convocatoria = $merito->convocatoria;
                        $postulation = Postulation::where('user_id','=',$user->id)->where('convocatoria_id','=',$convocatoria->id)->firstOrFail();
                        $archivos = $postulation->archivos->count();
                        $documentos = $convocatoria->documentos->where('importancia','=','Obligatorio')->count();
                        if ($documentos == $archivos) {
                            $certificado = new Certificado();
                            $certificados = Certificado::where('detalle_id', '=', $detalle->id)
                                ->where('postulation_id', '=', $postulation->id)->get();
                            $certificado->name=$request->input('name');
                            $certificado->merito_id=$request->input('merito_id');
                            $certificado->item_id=$request->input('item_id');
                            $certificado->subitem_id=$request->input('subitem_id');
                            $certificado->detalle_id=$request->input('detalle_id');
                            $certificado->postulation_id=$postulation->id;

                            $puntajeDetalles = 0;

                            foreach($subitem->detalles as $detalle1) {
                                $puntajeDetalles += $detalle1->certificados->where('postulation_id', $postulation->id)->sum('puntos');
                            }

                            if(($puntajeDetalles + $detalle->puntos) <= $subitem->puntos) {
                                $certificado->puntos = $detalle->puntos;
                                $postulation->puntaje_certificados += $detalle->puntos;
                                $postulation->save();
                            } else if(($subitem->puntos - $puntajeDetalles) < $detalle->puntos) {
                                $certificado->puntos = $subitem->puntos - $puntajeDetalles;
                                $postulation->puntaje_certificados += $subitem->puntos - $puntajeDetalles;
                                $postulation->save();
                            }

                            if($request->file('file')){
                                $path = Storage::disk('public')->put('meritos',  $request->file('file'));
                                $certificado->fill(['file' => asset($path)])->save();
                            }
                            $certificado->save();

                            return back()->with('confirmacion','Detalle subido Correctamente');
                        } else {
                            return back()->with('negacion','Primero debe subir los documentos obligatorios');
                        }
                    }
                }
            }
        }
    }

    public function show(Certificado $certificado)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $certificado = Certificado::find($id);
        $postulation = $certificado->postulation;
        $convocatoria = $postulation->convocatoria;
        $puntosAc = 0;

        if($certificado->merito_id !== null) {
            if($request->merito > $certificado->merito->puntos) {
                return back()->with('negacion', 'El puntaje no puede ser mayor al mencionado');
            } else if($request->merito < 0) {
                return back()->with('negacion', 'El puntaje no puede ser menor a 0');
            } else {
                $certificados = Certificado::where('merito_id', '=', $certificado->merito->id)
                    ->where('postulation_id', '=', $postulation->id)->get();
                if(($certificados->sum('puntos') - $certificado->puntos + $request->merito) > $certificado->merito->puntos) {
                    return back()->with('negacion', 'La sumatoria de puntajes no debe pasar a la del merito. '
                        . 'Puntaje merito: ' . $certificado->merito->puntos . ' vs Puntaje Actual: '
                        . $certificados->sum('puntos')
                    );
                } else {
                    $puntosAc = $certificado->puntos - $request->merito;
                    $postulation->puntaje_certificados -= $puntosAc;
                    $certificado->puntos = $request->input('merito');
                    $certificado->name = $request->input('name');
                    $postulation->save();
                }
            }
        } else if($certificado->item_id !== null) {
            if($request->item > $certificado->item->puntos) {
                return back()->with('negacion', 'El puntaje no puede ser mayor al mencionado');
            } else if($request->item < 0) {
                return back()->with('negacion', 'El puntaje no puede ser menor a 0');
            } else {
                $certificados = Certificado::where('item_id', '=', $certificado->item->id)
                    ->where('postulation_id', '=', $postulation->id)->get();
                if(($certificados->sum('puntos') - $certificado->puntos + $request->item) > $certificado->item->merito->puntos) {
                    return back()->with('negacion', 'La sumatoria de puntajes no debe pasar a la del merito. '
                        . 'Puntaje items subidos: ' . $certificados->sum('puntos') . ' vs Puntaje del Merito: '
                        . $certificado->item->merito->puntos
                    );
                } else {
                    $puntosAc = $certificado->puntos - $request->item;
                    $postulation->puntaje_certificados -= $puntosAc;
                    $certificado->puntos = $request->input('item');
                    $certificado->name = $request->input('name');
                    $postulation->save();
                }
            }
        } else if($certificado->subitem_id !== null) {
            if($request->subitem > $certificado->subitem->puntos) {
                return back()->with('negacion', 'El puntaje no puede ser mayor al mencionado');
            } else if($request->subitem < 0) {
                return back()->with('negacion', 'El puntaje no puede ser menor a 0');
            } else {
                $certificados = Certificado::where('subitem_id', '=', $certificado->subitem->id)
                    ->where('postulation_id', '=', $postulation->id)->get();
                if(($certificados->sum('puntos') - $certificado->puntos + $request->subitem) > $certificado->subitem->item->puntos) {
                    return back()->with('negacion', 'La sumatoria de puntajes no debe pasar a la del item. '
                        . 'Puntaje subitems subidos: ' . $certificados->sum('puntos') . ' vs Puntaje del item: '
                        . $certificado->subitem->item->puntos
                    );
                } else {
                    $puntosAc = $certificado->puntos - $request->subitem;
                    $postulation->puntaje_certificados -= $puntosAc;
                    $certificado->puntos = $request->input('subitem');
                    $certificado->name = $request->input('name');
                    $postulation->save();
                }
            }
        } else if($certificado->detalle_id !== null) {
            if($request->detalle > $certificado->detalle->puntos) {
                return back()->with('negacion', 'El puntaje no puede ser mayor al mencionado');
            } else if($request->detalle < 0) {
                return back()->with('negacion', 'El puntaje no puede ser menor a 0');
            } else {
                $certificados = Certificado::where('detalle_id', '=', $certificado->detalle->id)
                    ->where('postulation_id', '=', $postulation->id)->get();
                if(($certificados->sum('puntos') - $certificado->puntos + $request->detalle) > $certificado->detalle->subitem->puntos) {
                    return back()->with('negacion', 'La sumatoria de puntajes no debe pasar a la del subitem. '
                        . 'Puntaje de detalles subidos: ' . $certificados->sum('puntos') . ' vs Puntaje del merito: '
                        . $certificado->detalle->subitem->puntos
                    );
                } else {
                    $puntosAc = $certificado->puntos - $request->detalle;
                    $postulation->puntaje_certificados -= $puntosAc;
                    $certificado->puntos = $request->input('detalle');
                    $certificado->name = $request->input('name');
                    $postulation->save();
                }
            }
        }
        $certificado->save();

        return back()->with('confirmacion','Certificado Editado Correctamente', [$certificado->postulation_id]);
    }

    public function destroy($id)
    {
        $certificado = Certificado::where('id', '=', $id)->firstOrFail();
        $postulation = $certificado->postulation;
        if($certificado->puntos !== 0) {
            $postulation->puntaje_certificados -= $certificado->puntos;
            $postulation->save();
        }
        $certificado->delete();
        return back()->with('confirmacion','Certificado Eliminado Correctamente');
    }
}
